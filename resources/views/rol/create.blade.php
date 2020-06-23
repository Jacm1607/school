@extends('template.theme')
@section('content')
<x-create url="rol">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <x-input-form label="Rol*" name="nombre" value="" type="text" attr="required" />
                    <div class="form-group @error('idPrivilegio') has-error has-danger @enderror ">
                        <label class="@error('idPrivilegio') error @enderror">Privilegio*</label>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input"type="checkbox" id="checkbox">
                              <span class="form-check-sign"></span>
                              Seleccionar Todos
                            </label>
                          </div>
                        <select class="js-example-basic-single form-control  @error('idPrivilegio') has-error @enderror" id="e1" name="idPrivilegio[]" multiple>
                            @foreach ($privilegios as $item)
                                <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                            @endforeach
                        </select>
                        @error('idPrivilegio')
                            <label class="error">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body form-group has-error has-danger">
                    <label for=""><b>Menu</b></label>
                    <hr>
                    <div class="controls">
                        <label id="1">Colapsar | </label>
                        <label id="2">Expandir | </label>
                        <label id="3">Seleccionar Todos | </label>
                        <label id="4">Deseleccionar Todos | </label>
                    </div>
                    <ul class="tree autoCheckbox">
                        @foreach ($menus as $key => $item)
                            @if ($item["idMenus"] != 0)
                                @break
                            @endif
                            @include("menu.menu-item",["item" => $item])
                        @endforeach
                    </ul>
                    @error('menu')
                        <label class="error">{{ $message }}</label>
                    @enderror
                    <x-button-form name="rol" success="Guardar"/>
                </div>
            </div>
        </div>
    </div>
</x-create>
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
        $(function () {
            $(".autoCheckbox").on("click",function () {
                var expr="li input[type=checkbox]",$this=$(event.target);
                while ($this.length) {
                    $input=$this.closest("li").find(expr);
                    if ($input.length) {
                        if ($this[0]==event.target) {
                            checked = $this.prop("checked");
                            $input.prop("checked", checked).css("opacity","1.0");
                        }
                        checked=$input.is(":checked");
                        $this.prop("checked", checked).css("opacity",(checked && $input.length!= $this.closest("li").find(expr+":checked").length) ? "0.5" : "1.0");
                    }
                    $this=$this.closest("ul").closest("li").find(expr.substr(3)+":first");
                }
            });
        })
        $("#checkbox").click(function(){
            if($("#checkbox").is(':checked') ){ //select all
                $("#e1").find('option').prop("selected",true);
                $("#e1").trigger('change');
            } else { //deselect all
                $("#e1").find('option').prop("selected",false);
                $("#e1").trigger('change');
            }
        });
        $(document).on('click','#1',()=>{
            $('.tree ul').fadeOut();
        })
        $(document).on('click','#2',()=>{
            $('.tree ul').fadeIn();
        })
        $(document).on('click','#3',()=>{
            $(".tree input[type='checkbox']").prop('checked', true);
        })
        $(document).on('click','#4',()=>{
            $(".tree input[type='checkbox']").prop('checked', false);
        })
    </script>
@endpush
