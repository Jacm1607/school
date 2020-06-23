@extends('template.theme')
@section('content')
    <x-index 
        name="Rol" inputSearch btnSearch 
        url="rol"
        :pag="$rol" 
        :head="['ID','NOMBRE','ESTADO','OPCIONES']"
    >

        <x-slot name="btnSearch">
            <x-button-search/>
        </x-slot>

        <x-slot name="inputSearch">
            <x-input-search name="nombre" placeholder="NOMBRE"/>
        </x-slot>

        @foreach ($rol as $item)
            <tr>
                <td>{{$item["id"]}}</td>
                <td>{{$item["nombre"]}}</td>
                <td>
                    @if ($item["estado"])
                        <span class="badge badge-success">Activo</span>
                    @else
                        <span class="badge badge-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-info btn-round btn-icon" rel="tooltip" title="" data-original-title="Ver" href="{{route('rol.show', $item["id"])}}"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <a class="btn btn-warning btn-round btn-icon" rel="tooltip" title="" data-original-title="Editar" href="{{route('rol.edit', $item["id"])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a class="btn btn-danger btn-round btn-icon" rel="tooltip" title="" data-original-title="Eliminar" href="{{route('rol.destroy', $item["id"])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
    </x-index>
@endsection