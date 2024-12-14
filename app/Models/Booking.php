<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'session_type',
        'is_ndis',
        'ndis_number',
        'message',
        'status',
        'rate',
        'client_id',
        'staff_id',
        'start_time',
        'end_time',
        'notes',
        'session_link'
    ];

    protected $casts = [
        'is_ndis' => 'boolean',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'rate' => 'decimal:2'
    ];
}
