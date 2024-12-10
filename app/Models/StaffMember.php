<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'position',
        'hourly_rate',
        'employment_type',
        'start_date',
        'end_date',
        'tax_file_number',
        'bank_account_name',
        'bank_bsb',
        'bank_account_number',
        'emergency_contact_name',
        'emergency_contact_phone',
        'qualifications',
        'specialties',
        'status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'hourly_rate' => 'decimal:2',
        'employment_type' => 'string',
        'status' => 'string'
    ];

    protected $hidden = [
        'tax_file_number',
        'bank_account_name',
        'bank_bsb',
        'bank_account_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'staff_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'staff_id');
    }

    public function markAsInactive()
    {
        $this->update([
            'status' => 'inactive',
            'end_date' => now()
        ]);
    }

    public function markAsOnLeave()
    {
        $this->update(['status' => 'on_leave']);
    }

    public function markAsActive()
    {
        $this->update(['status' => 'active']);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getFullNameAttribute()
    {
        return $this->user->name;
    }
}
