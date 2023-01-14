@extends('layouts._app')
@section('title', 'Login')
@section('content')
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="container m-5">
                <form method="POST" class="form-floating px-5" action="{{ route('login') }}">
                    @csrf
                    <div class="col mb-2">
                        <h1 class="h3 mb-3 fw-normal">{{ __('Login') }}</h1>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="example@email.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="col mb-2">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <div class=" col checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                        <button class="w-100 btn btn-lg btn-login my-2" type="submit">Login</button>
                        <p class="text-muted">
                            Don't have an account? <a href="{{ route('register') }}">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
