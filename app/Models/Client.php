<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'phone_number',
        'type',
        'location',
        'statut'
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
