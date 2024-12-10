<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'client_id',
        'session_id',
        'invoice_date',
        'due_date',
        'amount',
        'tax_amount',
        'total_amount',
        'status',
        'notes',
        'is_ndis',
        'payment_method',
        'paid_at'
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'due_date' => 'date',
        'amount' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'is_ndis' => 'boolean',
        'paid_at' => 'datetime',
        'status' => 'string'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function markAsPaid($paymentMethod = null)
    {
        $this->update([
            'status' => 'paid',
            'payment_method' => $paymentMethod,
            'paid_at' => now()
        ]);
    }

    public function markAsOverdue()
    {
        if ($this->due_date->isPast() && $this->status === 'sent') {
            $this->update(['status' => 'overdue']);
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            if (empty($invoice->invoice_number)) {
                $invoice->invoice_number = 'INV-' . date('Y') . '-' . str_pad(static::count() + 1, 5, '0', STR_PAD_LEFT);
            }
        });
    }
}
