@extends('layouts.guest')

@section('main-content')
    <section class="forgot-password">
        <div>
            Inserisci la tua email per reimpostare la tua password
        </div>
    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <label for="email">
                    Email
                </label>
                <input type="email" id="email" name="email">
            </div>
    
            <div>
                <button type="submit" class="login-button">
                    Email Password Reset Link
                </button>
            </div>
        </form>
    </section>
@endsection
