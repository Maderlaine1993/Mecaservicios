<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicioMe extends Model
{
    use HasFactory;
    public $table='servicio_mecanico';
    public $timestamps=false;
    protected $fillable =[
        'id_serv_mec', 'servicio_id', 'repuesto_id', 'mecanico_id','cliente_nit','vehiculo_placa','fecha','estado'
    ];

    protected $primaryKey = 'id_serv_mec';
}
