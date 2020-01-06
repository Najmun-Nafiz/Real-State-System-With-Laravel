@extends('layouts.app')

@section('content')
<!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
    <div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-end align-items-center">
                <div class="btn-group btn-group-sm">
                    <a href="#" class="btn btn-outline-secondary">Help</a>
                    <a href="#" class="btn btn-outline-secondary">About Us</a>
                </div>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="auth-form-wrap pt-xl-0 pt-70">
                            <div class="auth-form w-xl-30 w-sm-50 w-100">
                                <a class="auth-brand text-center d-block mb-20" href="#">
                                    <img class="brand-img" src="{{asset('back/dist/img/logo-light.png')}}" alt="brand" />
                                </a>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <h1 class="display-5 mb-10 text-center">Need help with your Password?</h1>
                                    <p class="mb-30 text-center">We will send new code to your <a href="#"><u>recovery email</u></a> to reset your password.</p>

                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    </div>

                                    <button class="btn btn-primary btn-block mb-20" type="submit">Send</button>
                                    <p class="text-right"><a href="{{ route('login') }}">Back to login</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
@endsection
