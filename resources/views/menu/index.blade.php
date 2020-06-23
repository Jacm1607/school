@extends('template.theme')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row ml-1 mr-1 d-flex align-items-center">
                    <a rel="tooltip" title="" data-original-title="Nuevo" class="btn btn-sm btn-primary btn-round btn-icon card-title mr-2" href="{{ route("menu.create") }}"><i class="fa fa-plus"></i></a><h5 class="card-title"> <font color="gray">|</font> </h5><h2 class="card-title ml-2"> Menu</h2>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <ul style="font-size: 18px" class="tree">
                    @foreach ($menus as $key => $item)
                        @if ($item["idMenus"] != 0)
                            @break
                        @endif
                        @if ($item["submenu"] == [])
                            <li>
                                <label> <i class=" nc-icon {{ $item['icon'] }}"></i> {{$item["nombre"]}}</label>
                                <a href="{{ route('menu.edit', $item['id']) }}" class="btn btn-warning btn-round btn-icon m-1 btn-sm"><i class="fa fa-pencil"></i></a>
                            </li>
                            @else
                            <li>
                                <label> <i class=" nc-icon {{ $item['icon'] }}"></i> {{$item["nombre"]}}</label>
                                <a href="{{ route('menu.edit', $item['id']) }}" class="btn btn-warning btn-round btn-icon m-1 btn-sm"><i class="fa fa-pencil"></i></a>
                                <ul class="tree">
                                    @foreach ($item["submenu"] as $submenu)
                                        @if ($submenu["submenu"] == [])
                                            <li>
                                                <label> <i class=" nc-icon {{ $submenu['icon'] }}"></i> {{$submenu["nombre"]}}</label>
                                                <a href="{{ route('menu.edit', $submenu['id']) }}" class="btn btn-warning btn-round m-1 btn-icon btn-sm"><i class="fa fa-pencil"></i></a>
                                            </li>
                                        @else
                                            <li>
                                                <label>{{$submenu["nombre"]}}</label>
                                                <a href="{{ route('menu.edit', $submenu['id']) }}" class="btn btn-warning btn-round m-1 btn-icon btn-sm"><i class="fa fa-pencil"></i></a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection