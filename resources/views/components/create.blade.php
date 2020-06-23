<form action="{{ route("$url.store") }}" method="post" autocomplete="off">
    @csrf
    {{ $slot }}
</form>
