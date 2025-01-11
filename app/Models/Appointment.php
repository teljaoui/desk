<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'time',
        'Commentaire',
        'client_id'
    ];
    public function Client(){
        return $this->belongsTo(Client::class);
    }
}
