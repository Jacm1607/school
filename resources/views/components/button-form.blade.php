<hr>
<div class="d-flex justify-content-end">
    <a href="{{ route("$name.index") }}" class="btn btn-secondary">Cancelar</a>
    @empty(!$success)
        <button type='submit' class='btn btn-success'> {{ $success }} </button>
    @endempty
</div>