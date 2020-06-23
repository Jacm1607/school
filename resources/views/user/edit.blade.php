@extends('template.app')
@section('css')
    <link rel="stylesheet" href="{{asset('template/css/select2/select2.min.css')}}">
@endsection
@include('template.left')
@section('content')
    <div class="all-content-wrapper">
        @include('template.navbarMobile')
        <br>
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <form action="{{route('user.update',$user->id)}}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline8-list mt-b-30">
                                <div class="sparkline8-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="basic-login-inner">
                                                    <div class="form-group-inner @error('idRol') input-with-error @enderror">
                                                        <label>Privilegios</label>
                                                        <select class="form-control select2_2" multiple name="idRol[]" id="idRol">
                                                            @foreach ($roles as $rol)
                                                                <option selected value="{{$rol["id"]}}">{{$rol["nombre"]}}</option>
                                                            @endforeach
                                                            @foreach ($no_asignados as $no_asig)
                                                                <option value="{{$no_asig["id"]}}">{{$no_asig["nombre"]}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('idRol')
                                                            <font style="color: #EC7063">
                                                                {{ $message }}
                                                            </font>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-9 col-xs-3"></div>
                                                        <div class="col-lg-3 col-xs-9">
                                                            <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                <a class="btn btn-secondary" href="{{route('user.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                                                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('template/js/select2/select2-active.js')}}"></script>
@endsection
