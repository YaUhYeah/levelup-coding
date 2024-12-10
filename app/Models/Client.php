<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'ndis_number',
        'status'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'status' => 'string'
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function serviceAgreements()
    {
        return $this->hasMany(ServiceAgreement::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function referral()
    {
        return $this->hasOne(Referral::class, 'converted_client_id');
    }
}
