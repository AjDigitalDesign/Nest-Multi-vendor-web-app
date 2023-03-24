@extends('layouts.admin.auth.login.app')

@section('login_form')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="content-main mt-80 mb-80">
        <div class="card mx-auto card-login">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Admin Sign in</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" id="email"
                               placeholder="Username" type="text" name="username" value="{{old('username')}}" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />
                    </div>
                    <!-- form-group// -->
                    <div class="mb-3">
                        <input class="form-control" id="password" name="password"
                               placeholder="Password" type="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                    </div>
                    <!-- form-group// -->
                    <div class="mb-3">
                        <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" checked="" name="remember" />
                            <span class="form-check-label">Remember</span>
                        </label>
                    </div>
                    <!-- form-group form-check .// -->
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                    <!-- form-group// -->
                </form>
            </div>
        </div>
    </section>
@endsection
