@if ($item['submenu'] == [])
<li class="">
    <a href="{{ url($item["url"]) }}">
        <i class="nc-icon {{ $item['icon'] }}"></i>
        <p>{{ $item['nombre'] }}</p>
    </a>
</li>
@else
<li>
    <a data-toggle="collapse" href="#{{ $item['nombre'] }}">
        <i class="nc-icon {{ $item['icon'] }}"></i>
        <p>{{ $item['nombre'] }} <b class="caret"></b></p>
    </a>
    <div class="collapse " id="{{ $item['nombre'] }}">
        <ul class="nav">
            @foreach ($item['submenu'] as $submenu)
                @include('template.sidebar-item',["item"=>$submenu])
            @endforeach
        </ul>
    </div>
</li>
@endif
