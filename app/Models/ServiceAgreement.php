<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceAgreement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'agreement_number',
        'start_date',
        'end_date',
        'total_amount',
        'hourly_rate',
        'total_hours',
        'services_provided',
        'terms_conditions',
        'status',
        'document_path',
        'signed_at',
        'signed_by'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_amount' => 'decimal:2',
        'hourly_rate' => 'decimal:2',
        'total_hours' => 'integer',
        'signed_at' => 'datetime',
        'status' => 'string'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function markAsActive()
    {
        $this->update(['status' => 'active']);
    }

    public function markAsExpired()
    {
        if ($this->end_date->isPast()) {
            $this->update(['status' => 'expired']);
        }
    }

    public function markAsCancelled()
    {
        $this->update(['status' => 'cancelled']);
    }

    public function sign($signedBy)
    {
        $this->update([
            'signed_at' => now(),
            'signed_by' => $signedBy,
            'status' => 'active'
        ]);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($agreement) {
            if (empty($agreement->agreement_number)) {
                $agreement->agreement_number = 'SA-' . date('Y') . '-' . str_pad(static::count() + 1, 5, '0', STR_PAD_LEFT);
            }
        });
    }
}
