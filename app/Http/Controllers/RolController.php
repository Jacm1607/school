<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Privilegio;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        priv('rol_index');
        $rol=Rol::nombre($request->nombre)->select('id','nombre','estado')->paginate(10);
        return view('rol/index')->with('rol',$rol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        priv('rol_create');
        $menu = Menu::getMenu();
        $privilegios = Privilegio::where('estado',1)->get()->toArray();
        return view('rol/create')
                ->with('privilegios',$privilegios)
                ->with('menus',$menu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        priv('rol_store');
        $request->validate([
            'nombre' => 'required|max:50|unique:rol',
            'idPrivilegio' => 'required',
            'menu' => 'required|min:1',
        ],[
            'nombre.required'=>'Campo obligatorio.',
            'idPrivilegio.required'=>'Campo obligatorio.',
            'menu.required'=>'Campo obligatorio.',
            'menu.min'=>'Seleccione un campos como minimo.',
            'nombre.max'=>'Maximo 50 caracteres.',
            'nombre.unique'=>'Ya existe este rol.',
        ]);
        $rol = new Rol();
        $rol->nombre = strtoupper($request->nombre);
        $privilegios = $request->idPrivilegio;
        $menus = $request->menu;
        $rol->save();
        $rol->privilegios()->attach($privilegios);
        $rol->menus()->attach($menus);
        return redirect()->route('rol.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        priv('rol_show');
        $rol = Rol::select('nombre')->findOrFail($id)->toArray();
        $privilegios=Rol::findOrFail($id)->privilegios()->get()->toArray();
        $main=Rol::findOrFail($id)->menus()->where('idMenus','0')->get()->toArray();
        $submain=Rol::findOrFail($id)->menus()->where('idMenus','!=','0')->get()->toArray();
        return view('rol/show')
                ->with('rol',$rol)
                ->with('privilegios',$privilegios)
                ->with('submain',$submain)
                ->with('main',$main);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        priv('rol_edit');
        $rol = Rol::findOrFail($id)->toArray();

        $privilegios = Rol::select('id','nombre')->findOrFail($id)->privilegios()->get()->toArray();
        foreach ($privilegios as $value) {
            $data[] = $value['id'];
        }
        $no_priv = Privilegio::select('id','nombre')->whereNotIn('id',$data)->get()->toArray();

        $main = Menu::getMenu();
        $mainRol = Rol::findOrFail($id)->menus()->get()->toArray();
        return view('rol/edit')
                    ->with('rol',$rol)
                    ->with('privilegio',$privilegios)
                    ->with('no_priv',$no_priv)
                    ->with('mainRol',$mainRol)
                    ->with('main',$main);
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
        priv('rol_update');
        $request->validate([
            'nombre' => 'required|max:50',
            'idPrivilegio' => 'required',
            'menu' => 'required|min:1',
        ],[
            'nombre.required'=>'Campo obligatorio.',
            'menu.required'=>'Campo obligatorio.',
            'menu.min'=>'Seleccione un campos como minimo.',
            'idPrivilegio.required'=>'Campo obligatorio.',
            'nombre.max'=>'Maximo 50 caracteres.',
        ]);
        $privilegios=$request->idPrivilegio;
        $menus=$request->menu;
        $rol = Rol::findOrFail($id);
        $rol->nombre=$request->nombre;
        $rol->save();

        $rol->privilegios()->detach();
        $rol->privilegios()->attach($privilegios);

        $rol->menus()->detach();
        $rol->menus()->attach($menus);
        return redirect()->route('rol.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        priv('rol_destroy');
        $rol=Rol::findOrFail($id);
        $rol->update(['estado'=>'0']);
        return redirect()->route('rol.index');
    }
}
