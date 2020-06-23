@extends('template.theme')
@section('content')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <x-input-form label="Rol*" name="nombre" :value="$rol['nombre']" type="text" attr="disabled" />
                        <div class="form-group">
                            <label class="">Privilegio*</label>
                            <select class="js-example-basic-single form-control" disabled multiple>
                                @foreach ($privilegios as $item)
                                    <option selected value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <label>Menu</label>
                        <div class="controls">
                            <label id="1">Colapsar | </label>
                            <label id="2">Expandir | </label>
                        </div>
                        <ul class="tree">
                            @foreach ($main as $key => $item)
                                <li>
                                    <input type="checkbox" checked disabled>
                                    <label>{{$item["nombre"]}}</label>
                                    <ul>
                                        @foreach ($submain as $sub_item)
                                            @if ($sub_item['idMenus'] == $item['id'])
                                                <li>
                                                    <input type="checkbox" checked disabled>
                                                    <label>{{$sub_item["nombre"]}}</label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                        <x-button-form name="rol" success=""/>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({});
        });
        $(document).on('click', '.tree label', function(e) {
            $(this).next('ul').fadeToggle();
            e.stopPropagation();
        });

        $(document).on('click','#1',()=>{
            $('.tree ul').fadeOut();
        })
        $(document).on('click','#2',()=>{
            $('.tree ul').fadeIn();
        })
    </script>
@endpush