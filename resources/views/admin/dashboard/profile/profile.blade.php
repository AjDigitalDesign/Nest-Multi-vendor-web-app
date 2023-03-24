@extends('layouts.admin.app')
@section('content')
    <section class="content-main">
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h5 class="page-header-title d-flex justify-content-center align-items-center align-self-center">
                                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div>
                                Admin Profile - {{$user_data->name}}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="{{route('admin.profile')}}">Profile</a>
                <a class="nav-link" href="{{route('admin.profile.password')}}">Change Password</a>
                <a class="nav-link" href="account-security.html">Security</a>
                <a class="nav-link" href="account-notifications.html">Notifications</a>
            </nav>
            <hr class="mt-0 mb-4">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Profile Picture</div>
                            <div class="card-body text-center">
                                <input type="file" class="form-control" name="profile_image"
                                       id="profile_image"
                                       value="{{$user_data->profile->profile_image}}">
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2" id="profile_image" height="60" width="60"
                                     src="{{(!empty($user_data->profile->profile_image)) ? url
                                                         ('uploads/admin/images/profile/'
                            .$user_data->profile->profile_image) : url('uploads/admin/images/default/default-avatar.jpeg')
                            }}" alt="">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Account Details</div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                        <input class="form-control" name="username" id="inputUsername" type="text"
                                               value="{{$user_data->username}}" readonly>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputFirstName">Name</label>
                                            <input class="form-control" name="name" id="inputFirstName" type="text"
                                                   value="{{$user_data->name}}">
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Email</label>
                                            <input name="email" class="form-control" id="inputLastName" type="email"
                                                   value="{{$user_data->email}}">
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Address</label>
                                        <input class="form-control" name="street_address" id="inputEmailAddress" type="text"
                                               placeholder="Enter your email address"
                                               value="{{$user_data->profile->street_address}}">
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputOrgName">City</label>
                                            <input class="form-control"  name="city" id="inputOrgName" type="text"
                                                   value="{{$user_data->profile->city}}">
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">State</label>
                                            <input class="form-control" name="state" id="inputLocation" type="text"
                                                   value="{{$user_data->profile->state}}">
                                        </div>
                                    </div>

                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputOrgName">Zipcode</label>
                                            <input class="form-control" name="zipcode" id="inputOrgName" type="number"
                                                   value="{{$user_data->profile->zipcode}}">
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">Country</label>
                                            <input class="form-control" name="country" id="inputLocation" type="text"
                                                   value="{{$user_data->profile->country}}">
                                        </div>
                                    </div>

                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputPhone">Phone number</label>
                                            <input class="form-control" name="phone_number" id="inputPhone" type="tel" placeholder="Enter
                                            your phone number" value="{{$user_data->profile->phone_number}}">
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- content-main end// -->

    <script
        src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#headshot').change(function(e){
                const image_reader = new FileReader();
                image_reader.onload = function (e){
                    $('#add_headshot').attr('src', e.target.result);
                }
                image_reader.readAsDataURL(e.target.files['0']);
            });
        })
    </script>
@endsection
