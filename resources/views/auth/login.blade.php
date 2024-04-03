@extends('layouts.guest')

@section('page-title', 'Login')

@section('main-content')
    <section class="login">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ( $errors->all() as $error )
                    <li>{{ $error}}</li>
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
