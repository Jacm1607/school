@extends('template.theme')
@section('content')
    <x-index 
        name="Usuario" inputSearch btnSearch 
        url="user"
        :pag="$user" 
        :head="['ID','NOMBRE','EMAIL','ESTADO','OPCIONES']"
    >

        <x-slot name="btnSearch">
            <x-button-search/>
        </x-slot>

        <x-slot name="inputSearch">
            <x-input-search name="email" placeholder="EMAIL"/>
        </x-slot>

        @foreach ($user as $item)
            <tr>
                <td>{{$item["id"]}}</td>
                <td>{{$item["id"]}}</td>
                <td>{{$item["email"]}}</td>
                <td>
                    @if ($item["estado"])
                        <span class="badge badge-success">Activo</span>
                    @else
                        <span class="badge badge-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-warning btn-round btn-icon" rel="tooltip" title="" data-original-title="Editar" href="{{route('user.edit', $item["id"])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a class="btn btn-danger btn-round btn-icon" rel="tooltip" title="" data-original-title="Eliminar" href="{{route('user.destroy', $item["id"])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
    </x-index>
@endsection