@extends('layouts.frontend.auth.login')
@section('content')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6 offset-lg-3">
                        <!-- Basic Card-->
                        <div id="basic">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="text-center">Email verification</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <p>
                                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                        </p>
                                    </div>

                                    @if (session('status') == 'verification-link-sent')
                                        <div class="mb-4">
                                            <p>
                                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                            </p>
                                        </div>
                                    @endif

                                    <div class="mt-4 d-flex justify-content-around">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf

                                            <div>
                                                <x-primary-button>
                                                    {{ __('Resend Verification Email') }}
                                                </x-primary-button>
                                            </div>
                                        </form>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button type="submit" class="btn">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
