@extends('template.theme')
@section('content')
    <x-index
        name="Privilegio" inputSearch btnSearch
        url="privilegio"
        :pag="$privilegio"
        :head="['ID','NOMBRE','SLUG','ESTADO','OPCIONES']"
    >

        <x-slot name="btnSearch">
            <x-button-search/>
        </x-slot>

        <x-slot name="inputSearch">
            <x-input-search name="nombre" placeholder="NOMBRE"/>
        </x-slot>
        <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span data-notify="icon" class="nc-icon nc-bulb-63"></span>
            <span data-notify="message"><b> Información - </b> Al modificar cualquier dato acerca de los privilegios, no olvide de borrar la cache del servidor para que se cargue y aplique la nueva configuración.</span>
        </div>
        @foreach ($privilegio as $item)
            <tr>
                <td>{{$item["id"]}}</td>
                <td>{{$item["nombre"]}}</td>
                <td>{{$item["slug"]}}</td>
                <td>
                    @if ($item["estado"])
                        <span class="badge badge-success">Activo</span>
                    @else
                        <span class="badge badge-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-warning btn-round btn-icon" rel="tooltip" title="" data-original-title="Editar" href="{{route('privilegio.edit', $item["id"])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a class="btn btn-danger btn-round btn-icon" rel="tooltip" title="" data-original-title="Eliminar" href="{{route('privilegio.destroy', $item["id"])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
    </x-index>
@endsection
