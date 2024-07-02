<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'is_visible',
        'categorias_id'
    ];

    public function precio_format()
    {
        return number_format($this->precio, 2, ',', '.');
    }

}