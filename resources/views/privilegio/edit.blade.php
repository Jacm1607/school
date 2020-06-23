@extends('template.theme')
@section('content')
<x-edit url="privilegio" :id="$privilegio['id']">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <x-input-form label="Privilegio*" name="nombre" :value="$privilegio['nombre']" type="text" attr="required" />
                    <x-button-form name="privilegio" success="Actualizar" />
                </div>
            </div>
        </div>
    </div>
</x-edit>
@endsection
