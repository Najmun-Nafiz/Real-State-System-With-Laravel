@extends('layouts.app')

@section('content')

            <div class="login">

            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <i class="zwicon-user-circle"></i>
                    Hi there! Please Sign in

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zwicon-more-h actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="{{ route('register') }}">Create an account</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="{{route('password.request')}}">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <form method="post" action="{{ route('login') }}">
                       @csrf
                    <div class="form-group">
                        <input type="text" class="form-control text-center" placeholder="Email Address" name="email" required>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control text-center" placeholder="Password" name="password" required>
                    </div>

                    
                    
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </form>
                </div>
            </div>

            <!-- Register -->
            <div class="login__block" id="l-register">
                <div class="login__block__header">
                    <i class="zwicon-user-circle"></i>
                    Create an account

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zwicon-more-h actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="#">Already have an account?</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="{{route('password.request')}}">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="form-group">
                        <input type="text" class="form-control text-center" placeholder="Name" name="name" required>
                    </div>

                    <div class="form-group form-group--centered">
                        <input type="text" class="form-control text-center" placeholder="Email Address" name="email" required>
                    </div>

                    <div class="form-group form-group--centered">
                        <input type="password" class="form-control text-center" placeholder="Password" name="password" required>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control text-center" placeholder="Confirm Password" type="password" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="radioDisabled" id="login-check" class="custom-control-input" required>
                            <label class="custom-control-label" for="login-check">Accept the license agreement</label>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Sign-Up</button>
                    </form>
                </div>
            </div>

            <!-- Forgot Password -->
            <div class="login__block" id="l-forget-password">
                <div class="login__block__header">
                    <i class="zwicon-user-circle"></i>
                    Forgot Password?

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zwicon-more-h actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="#">Already have an account?</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="#">Create an account</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <p class="mb-5">We will send new code to your <a href="#"><u>recovery email</u></a> to reset your password.</p>

                    <div class="form-group">
                        <input type="text" class="form-control text-center" placeholder="Email Address" required>
                    </div>

                    <button class="btn btn-primary btn-block mb-20" type="submit">Send</button>
                    <a href="{{ route('login') }}" style="margin-top: 10px;background-color: red; color: #fff;border-color: #007bff;">Back to login</a>

                </form>
                </div>
            </div>
        </div>


@endsection
