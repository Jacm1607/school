@extends('template.app')

@section('content')
<div class="error-pagewrap">
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
</div>
@endsection
