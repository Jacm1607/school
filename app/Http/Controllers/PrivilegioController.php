<?php

namespace App\Http\Controllers;

use App\Privilegio;
use Illuminate\Http\Request;

class PrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        priv('privilegio_index');
        $privilegios=Privilegio::nombre($request->nombre)->select('id','slug','nombre','estado')->orderBy('nombre','asc')->paginate(10);
        return view('privilegio/index')->with('privilegio',$privilegios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        priv('privilegio_create');
        return view('privilegio/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        priv('privilegio_store');
        $request->validate([
            'nombre' => 'required|max:50|unique:privilegio',
        ],[
            'nombre.required'=>'Campo obligatorio.',
            'nombre.max'=>'Maximo 50 caracteres.',
            'nombre.unique'=>'Ya existe este privilegio.',
        ]);
        $privilegio = new Privilegio();
        $privilegio->nombre = strtoupper($request->nombre);
        $privilegio->slug = strtolower(str_replace(' ', '_', $request->nombre));
        $privilegio->save();
        return redirect()->route('privilegio.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        priv('privilegio_edit');
        $privilegio = Privilegio::findOrFail($id)->toArray();
        return view('privilegio/edit')->with('privilegio',$privilegio);
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
        priv('privilegio_update');
        $request->validate([
            'nombre' => 'required|max:50',
        ],[
            'nombre.required'=>'Campo obligatorio.',
            'nombre.max'=>'Maximo 50 caracteres.',
        ]);
        $privilegio=Privilegio::findOrFail($id);
        $privilegio->nombre = strtoupper($request->nombre);
        $privilegio->slug = strtolower(str_replace(' ', '_', $request->nombre));
        $privilegio->save();
        return redirect()->route('privilegio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        priv('privilegio_destroy');
        $privilegio=Privilegio::findOrFail($id);
        $privilegio->update(['estado'=>'0']);
        return redirect()->route('privilegio.index');
    }
}
