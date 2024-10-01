<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'tb_municipio';
    protected $primaryKey = 'muni_codi'; // Indica que la clave primaria es muni_codi
    public $incrementing = false; // Si el campo muni_codi no es auto incremental
    public $timestamps = false; // Desactiva el manejo automático de created_at y updated_at
}
