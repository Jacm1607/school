<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idPersona', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles ()
    {
        return $this->belongsToMany('App\Rol', 'usuario_rol', 'idUsuario', 'idRol')->select('id','nombre');
    }

    public function setSession( $roles ) {
        if (count($roles) == 1) {
            Session::put([
                'roles' => $roles[0]['id'],
                'rol_nombre' => $roles[0]['nombre'],
            ]);
        } else {
            // dd($roles);
            $array_rol = array();
            foreach ($roles as $value) {
                array_push($array_rol,$value['id']);
            }
            Session::put('roles', $array_rol);
        }
    }

    public function scopeEmail ($query , $email) {
        if ($email) {
            return $query->where('email','LIKE',"%$email%");
        }
    }
}
