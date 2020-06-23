<form action="{{route("$url.update", $id )}}" method="post" autocomplete="off">
{{-- <form action="" method="post" autocomplete="off"> --}}
    @method('PUT')
    @csrf
    {{ $slot }}
</form>
