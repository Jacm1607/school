<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row ml-1 mr-1 d-flex align-items-center">
                    <a rel="tooltip" title="" data-original-title="Nuevo" class="btn btn-sm btn-primary btn-round btn-icon card-title mr-2" href="{{ route("$url.create") }}"><i class="fa fa-plus"></i></a><h5 class="card-title"> <font color="gray">|</font> </h5><h2 class="card-title ml-2"> {{ $name }}</h2>
                </div>
                <hr>
            </div>
            <div class="card-body pt-0">
                <form class="form-horizontal" action="{{ route("$url.index") }}" autocomplete="off" method="get">
                    <div class="row">
                        <div class="form-group mb-0 input-group no-border d-flex align-items-center justify-content-end">
                            {{ $inputSearch }}
                            {{ $btnSearch }}
                            <label class="mr-5" for=""><i rel="tooltip" title="Para volver a mostrar todos los registros haga click en el boton de buscar con el campo vacio." data-original-title="Buscar" class="fa fa-info fa-2x"></i></label>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr class="text-secondary">
                                    @foreach ($head as $hd)
                                        <th>{{ $hd }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                {{ $slot }}
                            </tbody>
                        </table>
                        {{ $pag }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>