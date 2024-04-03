@extends('layouts.guest')

@section('page-title', 'Login')

@section('main-content')
    <section class="login">

        @if($errors->any())
            <div class="alert alert-danger error-div">
                <ul class="mb-0 p-0 d-flex justify-content-center align-items-center">
                    @foreach ( $errors->all() as $error )
                    <li class="p-0">{{ $error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <label for="email">
                    Email
                </label>
                <input type="email" id="email" name="email" value="{{ old ('email') }}">
            </div>
    
            <!-- Password -->
            <div>
                <label for="password">
                    Password
                </label>
                <input type="password" id="password" name="password" minlength="8">

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            
            <button type="submit" class="login-button">
                Log in
            </button>
            <!-- Remember Me -->
            <div>
                <label for="remember_me">
                    <input class="remember" type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
            </div>
        </form>
    </section>
@endsection
