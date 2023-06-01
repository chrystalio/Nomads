@extends('layouts._app')
@section('title', 'Login')
@section('content')
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="container m-5">
                <form method="POST" class="form-floating px-5" action="{{ route('register') }}">
                    @csrf
                    <div class="col mb-2">
                        <h1 class="h3 mb-3 fw-normal">{{ __('Register') }}</h1>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="name">Name</label>

                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="username">Username</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Example@email.com" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="email">Email address</label>
                    </div>
                    <div class="col mb-2">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                       </span>
                        @enderror
                        <label for="password">Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Current Password">

                        <label for="password-confirm">Confirm Password</label>
                    </div>
                    <div class=" col checkbox mb-3">
                        <button class="w-100 btn btn-lg btn-login my-2" type="submit">Register</button>
                        <p class="text-muted">
                            Don't have an account? <a href="{{ route('login') }}">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
