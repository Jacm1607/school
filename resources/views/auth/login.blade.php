@extends('template.theme')

@section('content2')
<div class="wrapper wrapper-full-page ">
    <div class="full-page section-image" filter-color="black" data-image="../../assets/img/bg/fabio-mangione.jpg">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="content">
        <div class="container">
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <form class="form" method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
              <div class="card card-login">
                <div class="card-header ">
                    <h3 class="header text-center mb-0">Login</h3>
                    <div class="card-header d-flex justify-content-center">
                        {{-- <img src="https://api.adorable.io/avatars/285/abott@adorable.png" style="width: 100px; height: 100px; border-radius: 16%;" alt=""> --}}
                        <lottie-player src="{{ asset('img/login/user-icon.json') }}"  background="transparent"  speed="0.5"  style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                    </div>
                </div>
                <div class="card-body ">
                  <div class="input-group @error('email') has-danger is-invalid @enderror">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                      </span>
                    </div>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control  @error('email') has-danger is-invalid @enderror" placeholder="ejemplo@ejemplo.com" autofocus />
                    @error('email')
                        <span class="form-text error"><b>{{ $message }}</b></span>
                    @enderror
                  </div>
                  <div class="input-group @error('password') has-danger is-invalid @enderror">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-key-25"></i>
                      </span>
                    </div>
                    <input type="password" name="password" id="password" autocomplete="current-password" placeholder="*********" class="form-control @error('password') has-danger is-invalid @enderror">
                    @error('password')
                        <span class="form-text error"><b>{{ $message }}</b></span>
                    @enderror
                  </div>
                  <br />
                </div>
                <div class="card-footer ">
                    <button class="btn btn-warning btn-round btn-block mb-3">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
{{-- <div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>Iniciar Sesión</h3>
            <p>iEdu</p>
            <img src="https://api.adorable.io/avatars/285/abott@adorable.png" style="width: 150px; height: 150px; border-radius: 16%;" alt="">
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form  method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="email" placeholder="usuario@ejemplo.com" required="" name="email" value="{{ old('email') }}" autofocus class="form-control form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="help-block small" style="color:#E74C3C"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="*********" required=""  autocomplete="current-password" value="" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="help-block small"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <button class="btn btn-success btn-block loginbtn">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © @php echo date("Y"); @endphp. All rights reserved. <a href="https://www.facebook.com/Consulogy-104196401305227/">Consulogy</a></p>
        </div>
    </div>
</div> --}}
@endsection
