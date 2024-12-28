<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'code'; // Especificar `code` como clave primaria
    public $incrementing = true;   // Activar auto-incremento
    protected $keyType = 'int';    // Indicar que el tipo de clave es entero

    protected $fillable = [
        'name',
        'last_name',
        'rating',
        'opinion',
        'image_path',
        'isVisible',
    ];
}
