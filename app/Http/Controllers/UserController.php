<?php

namespace App\Http\Controllers;

use App\BitEmoji;
use App\Menu;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Rol;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        priv('usuario_index');
        $user = User::email($request->email)->select('id','email','estado')->paginate(15);
        return view('user/index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        priv('usuario_create');
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        priv('usuario_store');
        $user = new User();
        $user->idPersona = $request->idPersona;
        $user->email = $request->email."@iedu.com";
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        priv('usuario_show');
        $user=User::select('idPersona')->findOrFail($id);
        $roles=User::findOrFail($id)->roles()->get()->toArray();
        return view('user/show')->with('idPersona',$user)->with('roles',$roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        priv('usuario_edit');
        $user = User::findOrFail($id);
        $roles = User::findOrFail($id)->roles()->get()->toArray();
        $no_asig = Rol::select('id','nombre')->whereNotIn('id',$roles)->get()->toArray();
        return view('user/edit')
                    ->with('user',$user)
                    ->with('roles',$roles)
                    ->with('no_asignados',$no_asig);
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
        priv('usuario_update');
        $request->validate([
            'idRol' => 'required|max:50',
        ],[
            'idRol.required'=>'Campo obligatorio.',
        ]);

        $roles=$request->idRol;
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->roles()->attach($roles);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        priv('usuario_destroy');
        $user = User::findOrFail($id);
        $user->estado = 0;
        $user->update();
        return redirect()->route('user.index');
    }

    /**
     * Reset of Password
     *
     */
    public function reset($id) {
        priv('usuario_reset');
        $user = User::findOrFail($id);
        $user->password = Hash::make("password");
        $user->update();
        return redirect()->route('user.index');
    }

    public function perfil( $id ) {
        // priv('usuario_create');
        $img = BitEmoji::paginate(4);
        $user = User::findOrFail($id)->toArray();
        return view('user/perfil')->with('user',$user)->with('img',$img);
    }

    public function update_perfil(Request $request , $id) {

        $request->validate([
            'password' => 'required|min:8',
        ],[
            'password.required'=>'Campo obligatorio.',
            'password.min'=>'Minimo 8 Caracteres.',
        ]);
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->update();
        return redirect(RouteServiceProvider::HOME);
    }
    public function update_photo(Request $request , $id) {

        $request->validate([
            'img' => 'required',
        ],[
            'img.required'=>'Para actualizar la imagen de perfil debe seleccionar una opción.',
        ]);
        $user = User::findOrFail($id);
        $user->img = $request->img;
        $user->update();
        return redirect(RouteServiceProvider::HOME);
    }
}
