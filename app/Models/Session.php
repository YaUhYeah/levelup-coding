<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'staff_id',
        'start_time',
        'end_time',
        'status',
        'notes',
        'rate',
        'is_ndis',
        'session_type',
        'location'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'rate' => 'decimal:2',
        'is_ndis' => 'boolean',
        'status' => 'string'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function staff()
    {
        return $this->belongsTo(StaffMember::class, 'staff_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function getDurationAttribute()
    {
        return $this->start_time->diffInMinutes($this->end_time);
    }

    public function getAmountAttribute()
    {
        return ($this->getDurationAttribute() / 60) * $this->rate;
    }
}
