@extends('layouts.app')

{{--  @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}

@section('content')
<article class="sign-up">
    <h3>LOGIN ADMIN</h3>
    <h3>Dinas Komunikasi, Informatika dan<br>
        Persandian Kabupaten Banyuwangi</h3><br></br>
    <form class="sign-up-form form" action="{{ route('login') }}" method="POST">
        @csrf
        <label class="form-label-wrapper">
            <p class="form-label">Email</p>
            <input class="form-input" type="email" name="email" placeholder="Masukkan Email" required>
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Password</p>
            <input class="form-input" type="password" name="password" placeholder="Masukkan Password" required>
        </label>
        {{-- <a class="link-info forget-link" href="##">Lupa Password?</a>
        <label class="form-checkbox-wrapper">
            <input class="form-checkbox" type="checkbox" required>
            <span class="form-checkbox-label">Ingatkan Saya</span>
        </label> --}}
        <button class="form-btn primary-default-btn transparent-btn">LOGIN</button>
        <!-- Belum punya akun?
            {{--  <a class="link-info forget-link" href="{{ route('register') }}">REGISTER</a>  --}} -->
    </form>
</article>
@endsection
