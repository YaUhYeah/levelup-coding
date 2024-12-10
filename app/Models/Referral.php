<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'ndis_number',
        'status',
        'converted_client_id',
        'admin_notes'
    ];

    protected $casts = [
        'status' => 'string'
    ];

    public function convertedClient()
    {
        return $this->belongsTo(Client::class, 'converted_client_id');
    }

    public function markAsContacted()
    {
        $this->update(['status' => 'contacted']);
    }

    public function markAsConverted(Client $client)
    {
        $this->update([
            'status' => 'converted',
            'converted_client_id' => $client->id
        ]);
    }

    public function markAsDeclined()
    {
        $this->update(['status' => 'declined']);
    }
}
