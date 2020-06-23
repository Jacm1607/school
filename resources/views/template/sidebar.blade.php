@if ($item['submenu'] == [])
<li class="active">
    <a href="dashboard.html">
        <i class="nc-icon nc-bank"></i>
        <p>{{ $item['nombre'] }}</p>
    </a>
</li>
@else
<li>
    <a data-toggle="collapse" href="#pagesExamples">
        <i class="nc-icon nc-book-bookmark"></i>
        <p>Pages <b class="caret"></b></p>
    </a>
    <div class="collapse " id="pagesExamples">
        <ul class="nav">
            @foreach ($item['submenu'] as $submenu)
                @include('template.sidebar-item',["item"=>$submenu])
            @endforeach
            <li>
                <a href="pages/timeline.html">
                    <span class="sidebar-mini-icon">T</span>
                    <span class="sidebar-normal"> Timeline </span>
                </a>
            </li>
        </ul>
    </div>
</li>
@endif

