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
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account? <a href="{{route('login')}}">{{ __
                                            ('Already
                                            registered?') }}</a></p>
                                        </div>
                                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text"  id="name"
                                                       name="name" placeholder="Name"
                                                        autofocus autocomplete="name"
                                                       value="{{old('name')}}"
                                                />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2
                                                text-danger" />
                                            </div>

                                            <div class="form-group">
                                                <input type="text" required name="username" placeholder="Username"
                                                       id="username"
                                                       value="{{old('username')}}"
                                                />
                                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                            </div>

                                            <div class="form-group">
                                                <input type="text" required id="email" name="email"
                                                       placeholder="Email"
                                                       value="{{old('email')}}"
                                                />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                            </div>

                                            <div class="form-group">
                                                <input required type="password" id="password" name="password"
                                                       placeholder="Password"
                                                       value="{{old('password')}}"
                                                />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <input required type="password"  name="password_confirmation"
                                                       placeholder="Confirm password"
                                                       value="{{old('password_confirmation')}}"
                                                />
                                                <x-input-error :messages="$errors->get('password_confirmation')"
                                                               class="mt-2 text-danger" />
                                            </div>

                                            <div class="form-group">
                                                <input required type="text"  name="street_address"
                                                       placeholder="street_address"
                                                       value="{{old('street_address')}}"
                                                />
                                                <x-input-error :messages="$errors->get('street_address')" class="mt-2" />
                                            </div>


                                            <div class="form-group">
                                                <input required type="text" id="city" name="city"
                                                       placeholder="city"
                                                       value="{{old('city')}}"
                                                />
                                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                            </div>

                                            <div class="form-group">
                                                <input required type="text" id="state" name="state"
                                                       placeholder="State"
                                                       value="{{old('State')}}"/>
                                                <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                            </div>

                                            <div class="form-group">
                                                <input required type="number" id="zipcode" name="zipcode"
                                                       placeholder="zipcode" value="{{old('zipcode')}}" />
                                                <x-input-error :messages="$errors->get('zipcode')" class="mt-2" />
                                            </div>

                                            <div class="form-group">
                                                <input required type="text" id="country" name="country"
                                                       placeholder="Country" value="{{old('country')}}" />
                                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                            </div>

                                            <div class="form-group">
                                                <input required type="number" id="phone_number" name="phone_number"
                                                       placeholder="Phone Number" value="{{old('phone_number')}}" />
                                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                            </div>


                                            <div class="form-group">
                                                <input type="file" class="form-control" name="profile_image"
                                                       id="profile_image"
                                                       value="{{old('profile_image')}}">
                                                <!-- Profile picture image-->
                                                <img class="img-account-profile rounded-circle mb-2"
                                                     id="preview_profile_image" height="60" width="60"
                                                     src="{{(!empty($user_data->profile->profile_image)) ? url
                                                         ('uploads/users/images/profile/'
                                                    .$user_data->profile->profile_image) : url
                                                    ('uploads/users/images/default/default-avatar.jpeg')
                                                    }}" alt="">
                                            </div>

{{--                                            <div class="login_footer form-group mb-50">--}}
{{--                                                <div class="chek-form">--}}
{{--                                                    <div class="custome-checkbox">--}}
{{--                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />--}}
{{--                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>--}}
{{--                                            </div>--}}
                                            <div class="form-group mb-30 mt-4">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">{{ __('Register') }}</button>
                                            </div>
{{--                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>--}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <a href="#" class="social-login facebook-login">
                                        <img src="{{asset('frontend/assets/imgs/theme/icons/logo-facebook.svg')}}" alt="" />
                                        <span>Continue with Facebook</span>
                                    </a>
                                    <a href="#" class="social-login google-login">
                                        <img src="{{asset('frontend/assets/imgs/theme/icons/logo-google.svg')}}" alt="" />
                                        <span>Continue with Google</span>
                                    </a>
                                    <a href="#" class="social-login apple-login">
                                        <img src="{{asset('frontend/assets/imgs/theme/icons/logo-apple.svg')}}" alt="" />
                                        <span>Continue with Apple</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
            integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo="
            crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#profile_image').change(function(e){
                    const image_reader = new FileReader();
                    image_reader.onload = function (e){
                        $('#preview_profile_image').attr('src', e.target.result);
                    }
                    image_reader.readAsDataURL(e.target.files['0']);
                });
            })
        </script>
    </main>

@endsection
