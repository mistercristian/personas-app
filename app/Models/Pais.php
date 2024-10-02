<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'tb_pais';
    protected $primaryKey = 'pais_codi'; // Indica que la clave primaria es muni_codi
    public $timestamps = false; // Desactiva el manejo automático de created_at y updated_at
}
