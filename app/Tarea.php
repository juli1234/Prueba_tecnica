<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        'Nombre' , 'fecha_inicio', 'fecha_fin','estado',
      ];
}
