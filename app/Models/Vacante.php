<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Candidato;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];

    //agregamos la relacion para obtener la descripcion de la categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //agregamos la relacion para obtener la descripcion del salario
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    //agregamos la relacion donde una vacante puede tener muchos candidatos
    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }

    //agregamos la relacion para enviar las notificaciones de la vacante al reclutador que creo la vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
