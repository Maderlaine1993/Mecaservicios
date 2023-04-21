<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificaciones extends Model
{
    use HasFactory;
    public $table='notificaciones';
    public $timestamps=false;
    protected $fillable =[
        'id_noti', 'nombre_n','correo_n','descripcion_n'
    ];

    protected $primaryKey = 'id_noti';
}
