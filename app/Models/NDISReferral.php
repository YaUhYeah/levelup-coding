<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NDISReferral extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'ndis_number',
        'date_of_birth',
        'support_needs',
        'goals',
        'referrer_name',
        'referrer_organization',
        'referrer_phone',
        'referrer_email',
        'notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
