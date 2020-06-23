@extends('template.app')
@include('template.left')
@section('content')
    <div class="all-content-wrapper">
       @include('template.navbarMobile')
        <br>
            <!-- Basic Form Start -->
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <form action="{{route('user.store')}}" method="post" autocomplete="off">
                    @csrf
                    <input type="text" name="idPersona" id="">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <div class="sparkline8-list mt-b-30">
                                <div class="sparkline8-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="basic-login-inner">
                                                    <div class="form-group-inner">
                                                        <label>Email</label>
                                                        <div class="input-group">
                                                            <input type="text" placeholder="ejemplo" name="email" class="form-control">
                                                            <span class="input-group-addon">@sistema.com</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="basic-login-inner">
                                                    <div class="form-group-inner">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="**********" />
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                                <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Guardar</button>
                                                            <label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic Form End-->

        {{-- End Content --}}
        {{-- Footer --}}
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Footer --}}
    </div>
@endsection
