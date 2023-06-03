<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recibo extends Model
{
    use HasFactory;
    public $table='recibo';
    public $timestamps=false;
    protected $fillable =[
        'id_recibo', 'serv_mec_id','observacion','descuento','costo_total'
    ];

    protected $primaryKey = 'id_recibo';
}
