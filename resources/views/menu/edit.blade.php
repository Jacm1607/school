@extends('template.theme')
@section('content')
<x-edit url="menu" :id="$main['id']">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registrar</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <x-input-form label="Nombre*" name="nombre" :value="$main['nombre']" type="text" attr="required" />
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('submain') has-error has-danger @enderror ">
                                <label class="@error('submain') error @enderror">Sub Menu*</label>
                                <select class="js-example-basic-single form-control  @error('submain') has-error @enderror" name="submain" >
                                    <option value="0">NINGUNO</option>
                                    @foreach ($main_sub as $item)
                                        <option selected value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                    @endforeach
                                    @foreach ($submain as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                    @endforeach
                                </select>
                                @error('submain')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <x-input-form label="Ruta*" name="url" :value="$main['url']" type="text" attr="" />
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('icono') has-error has-danger @enderror ">
                                <label class="@error('icono') error @enderror">Icono*</label>
                                <select class="js-example-basic-single form-control  @error('icono') has-error @enderror" name="icono" >
                                    <option value="{{ $main['icon'] }}">{{ $main['icon'] }}</option>
                                    @foreach ($icon as $item)
                                        <option value="{{ $item['icon'] }}">{{ $item['icon'] }}</option>
                                    @endforeach
                                </select>
                                @error('icono')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <x-button-form name="menu" success="Guardar" />
                </div>
            </div>
        </div>
    </div>
</x-edit>
@endsection
@push('scripts')
    <script>
        function formatState (state) {
            console.log(state)
            if (!state.id) {
                return state.text;
            }
            var $state = $('<span><i class="nc-icon '+state.text+'"/></i> '+state.text+'</span>');
            return $state;
        };

        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "SELECCIONE UNA OPCION",
                allowClear: true,
                templateResult: formatState
            });
        });
    </script>
@endpush
