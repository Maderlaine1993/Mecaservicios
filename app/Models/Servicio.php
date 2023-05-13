<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    public $table='servicio';
    public $timestamps=false;
    protected $fillable =[
        'id_servicio',
        'snombre',
        'scosto'
    ];

    protected $primaryKey = 'id_servicio';
}
