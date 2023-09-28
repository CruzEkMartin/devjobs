<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
       'vacante_id',
       'cv' 
    ];

    //relacionamos con la tablas de usuarios para conocer los datos del candidato
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
