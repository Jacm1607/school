@extends('template.theme')
@section('content')
<div class="row">
    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top" src='{{ asset("img/bitemoji/$user[img]") }}' alt="{{ $user['email'] }}">
        <div class="card-body">
          <div class="author d-flex justify-content-center">
              <h5 class="title">{{ $user['img'] }}</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5>Actualizar Perfil</h5>
                  <hr>
                  <div class="form-group ml-3 @error("img") has-label has-danger @enderror ">
                    @error("img")
                        <label class="error" for="img">{{ $message }}</label>
                    @enderror
                </div>
                </div>
                <div class="card-body">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul id="tabs" class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#imagen" role="tab" aria-expanded="true" aria-selected="true">Imagen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#usuario" role="tab" aria-expanded="false" aria-selected="false">Usuario</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="imagen" role="tabpanel" aria-expanded="true">
                        <form method="POST" autocomplete="off" action="{{ route('user.update_photo', $user['id']) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach ($img as $item)
                                            <div class="col-md-3">
                                                <img class="card-img-top" src="{{ asset("img/bitemoji/$item->nombre") }}" alt="Card image cap">
                                                <div class="form-check-radio">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="img" id="img" value="{{ $item->nombre }}">
                                                        {{ $item->nombre }}
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            {{ $img->links() }}
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-success">Actualizar Foto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="usuario" role="tabpanel" aria-expanded="false">
                        <form method="POST" autocomplete="off" action="{{ route('user.update_perfil', $user['id']) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <x-input-form label="Contraseña" name="password" value="" type="passwordb" attr="" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button class="btn btn-success">Actualizar Datos</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection
