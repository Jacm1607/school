<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Icon;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        priv('menu_index');
        $menus = Menu::getMenu();
        return view('menu/index')->with('menus',$menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        priv('menu_create');
        $submain = Menu::where('idMenus','0')->get()->toArray();
        $icon = Icon::all()->toArray();
        return view('menu/create')->with('icon',$icon)->with('submain',$submain);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // priv('menu_store');

        $request->validate([
            'nombre' => 'required|max:50|unique:menu',
            'submain' => 'required',
            'url' => 'max:50',
            'icono' => 'required',
        ],[
            'nombre.required'=>'Campo obligatorio.',
            'submain.required'=>'Campo obligatorio.',
            'icono.required'=>'Campo obligatorio.',
            'nombre.max'=>'Maximo 50 caracteres.',
            'url.max'=>'Maximo 50 caracteres.',
            'nombre.unique'=>'Ya existe este menu.',
        ]);
        $menu = New Menu();
        $menu->nombre = strtoupper($request->nombre);
        $menu->idMenus = $request->submain;
        $menu->url = $request->url;
        $menu->icon = $request->icono;
        $menu->orden = '0';
        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        priv('menu_edit');
        $main = Menu::findOrFail($id)->toArray();
        $main_sub = Menu::select('id','nombre')->where('id',$main['idMenus'])->get()->toArray();
        $submain = Menu::where('idMenus','0')->where('id','!=',$main['idMenus'])->get()->toArray();
        $icon = Icon::where('icon','!=',$main['icon'])->get()->toArray();
        return view('menu/edit')
                    ->with('main',$main)
                    ->with('main_sub',$main_sub)
                    ->with('icon',$icon)
                    ->with('submain',$submain);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        priv('menu_update');
        $request->validate([
            'nombre' => 'required|max:50',
            'submain' => 'required',
            'url' => 'max:50',
            'icono' => 'required',
        ],[
            'nombre.required'=>'Campo obligatorio.',
            'submain.required'=>'Campo obligatorio.',
            'icono.required'=>'Campo obligatorio.',
            'nombre.max'=>'Maximo 50 caracteres.',
            'url.max'=>'Maximo 50 caracteres.',
        ]);
        $menu = Menu::findOrFail($id);
        $menu->nombre = strtoupper($request->nombre);
        $menu->idMenus = $request->submain;
        $menu->url = $request->url;
        $menu->icon = $request->icono;
        $menu->orden = '0';
        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
