<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruta extends Model
{
protected $fillable = ['nombre', 'descripcion', 'precio', 'fecha'];
// Añade esto para desactivar las columnas automáticas de fecha
    public $timestamps = false;
}
