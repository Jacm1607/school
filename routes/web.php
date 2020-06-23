<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index')->name('Home');
    Route::resource('/menu', 'MenuController');
    Route::resource('/user', 'UserController');
    Route::get('user/{id}/destroy',[
        'uses'  => 'UserController@destroy',
        'as'    => 'user.destroy'
    ]);
    Route::put('user/{id}/update-perfil',[
        'uses'  => 'UserController@update_perfil',
        'as'    => 'user.update_perfil'
    ]);
    Route::put('user/{id}/update-photo',[
        'uses'  => 'UserController@update_photo',
        'as'    => 'user.update_photo'
    ]);
    Route::get('user/{id}/perfil',[
        'uses'  => 'UserController@perfil',
        'as'    => 'user.perfil'
    ]);
    Route::get('user/{id}/reset',[
        'uses'  => 'UserController@reset',
        'as'    => 'user.reset'
    ]);

    Route::resource('rol','RolController');
    Route::get('rol/{id}/destroy',[
        'uses'  => 'RolController@destroy',
        'as'    => 'rol.destroy'
    ]);
    Route::resource('privilegio','PrivilegioController');
    Route::get('privilegio/{id}/destroy',[
        'uses'  => 'PrivilegioController@destroy',
        'as'    => 'privilegio.destroy'
    ]);
});


Auth::routes();
