@extends('layouts.guest')

@section('main-content')
    <section class="login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <label for="email">
                    Email
                </label>
                <input type="email" id="email" name="email">
            </div>
    
            <!-- Password -->
            <div>
                <label for="password">
                    Password
                </label>
                <input type="password" id="password" name="password">

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
