@extends('template.theme')

@section('content2')
<div class="wrapper wrapper-full-page ">
    <div class="full-page lock-page section-image" filter-color="black" data-image="">
      <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
      <div class="content">
        <div class="container mt-0">
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-lock text-center">
              <div class="card-header d-flex justify-content-center ">
                <lottie-player src="{{ asset('img/error/404.json') }}"  background="transparent"  speed="0.5"  style="width: 200px; height: 200px;" loop autoplay></lottie-player>
              </div>
              <div class="card-body">
                <h4 class="card-title">Error 404 - Pagina no encontrada</h4>
                <a href="{{ url('/') }}" class="btn btn-secondary"><i class="fa fa-home"></i> Inicio</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
