<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;
    public $table='repuesto';
    public $timestamps=false;
    protected $fillable =[
        'id_respuesto', 'rnombre','rcantidad', 'rprecio','stock_min'
    ];

    protected $primaryKey = 'id_repuesto';
}

