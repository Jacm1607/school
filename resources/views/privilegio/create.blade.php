@extends('template.theme')
@section('content')
<x-create url="privilegio">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <x-input-form label="Privilegio*" name="nombre" value="" type="text" attr="required" />
                    <x-button-form name="privilegio" success="Guardar" />
                </div>
            </div>
        </div>
    </div>
</x-create>
@endsection
