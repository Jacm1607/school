<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol',
        $fillable = ['id', 'nombre', 'estado'],
        $timestamp = true;

    public function privilegios() {
        return $this->belongsToMany('App\Privilegio', 'rol_privilegio', 'idRol', 'idPrivilegio')->select('id','nombre');
    }

    public function menus() {
        return $this->belongsToMany('App\Menu', 'rol_menu', 'idRol', 'idMenu');
    }

    public function scopeNombre($query ,$nombre) {
        if ($nombre) {
            return $query->where('nombre','LIKE',"%$nombre%");
        }
    }
}
