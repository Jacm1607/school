<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    protected $table = 'privilegio',
        $fillable = ['id', 'nombre' , 'slug' , 'estado'];
    public $timestamps = true;

    public function scopeNombre($query ,$nombre) {
        if ($nombre) {
            return $query->where('nombre','LIKE',"%$nombre%");
        }
    }

    public function roles()
    {
        return $this->belongsToMany('App\Rol', 'rol_privilegio', 'idPrivilegio', 'idRol');
    }
}
