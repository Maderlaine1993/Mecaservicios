<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class trabajador extends Model implements Authenticatable
{
    protected $table = 'trabajador';
    protected $primaryKey = 'tnum';
    protected $fillable = [
        'tnum', 'contrasenia', 'tnombre', 'tapellido', 'rol_id'
    ];
    protected $hidden = [
        'contrasenia', 'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'tnum';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->contrasenia;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
