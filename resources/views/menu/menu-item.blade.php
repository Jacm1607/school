@if ($item["submenu"] == [])
<li>
    <input type="checkbox" name="menu[]" value="{{ $item['id'] }}">
    <label>{{$item["nombre"]}}</label>
</li>
@else
<li>
    <input type="checkbox" name="menu[]" value="{{ $item['id'] }}">
    <label>{{$item["nombre"]}}</label>
    <ul class="tree">
        @foreach ($item["submenu"] as $submenu)
        @include("menu.menu-item",[ "item" => $submenu ])
        @endforeach
    </ul>
</li>
@endif