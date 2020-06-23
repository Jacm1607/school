<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table="menu",
    $fillable=["id","idMenus","nombre","url","icon","orden"];

    public $timestamps = false;

    public function getHijos($padres,$line){
        $children = [];
        foreach ($padres as $line1) {
            if ($line['id']==$line1['idMenus']) {
                $children = array_merge($children,[array_merge($line1,['submenu'=>$this->getHijos($padres,$line1)])]);
            }
        }
        return $children;
    }

    public function getPadres($front){
        if ($front) {
            return $this->whereHas('roles',function ($query){
                $query->where('idRol',session()->get('roles'))->orderBy('idMenus');
                // $query->where('idRol','1')->orderBy('idMenus');
            })->orderBy('idMenus')
                ->orderBy('orden')
                ->get()
                ->toArray();
        } else {
            return $this->orderBy('idMenus')
                        ->orderBy('orden')
                        ->get()
                        ->toArray();
        }
    }

    public static function getMenu($front=false){
        $menus = new Menu();
        $padres = $menus->getPadres($front);
        $menuAll=[];
        foreach ($padres as $line) {
            if ($line['idMenus'] != 0){
                break;
            }
            $item = [array_merge($line,['submenu'=>$menus->getHijos($padres,$line)])];
            $menuAll=array_merge($menuAll,$item);
        }
        return $menuAll;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Rol', 'rol_menu', 'idMenu', 'idRol');
    }
}
