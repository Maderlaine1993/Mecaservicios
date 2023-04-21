<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    use HasFactory;
    public $table='compras';
    public $timestamps=false;
    protected $fillable =[
        'id_compras', 'nombre_co'
    ];

    protected $primaryKey = 'id_compras';
}
