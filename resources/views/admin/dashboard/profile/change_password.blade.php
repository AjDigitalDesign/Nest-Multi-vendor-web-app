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
                                 Change Password
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
                <a class="nav-link" href="">Security</a>
                <a class="nav-link" href="">Notifications</a>
            </nav>
            <hr class="mt-0 mb-4">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="row">

                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Change Password Details</div>
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.profile.password_update')}}">
                                    @csrf
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-12 mb-3">
                                            <label class="small mb-1" for="inputFirstName">Old Password</label>
                                            <input class="form-control" name="currentPassword" id="currentPassword"
                                                   type="password"
                                                   value="{{old('currentPassword')}}">
                                            <x-input-error :messages="$errors->get('currentPassword')" class="mt-2 text-danger" />

                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-12 mb-lg-3 mb-3">
                                            <label class="small mb-1" for="inputLastName">New Password</label>
                                            <input name="newPassword" class="form-control" id="newPassword"
                                                   type="password"
                                                   value="{{old('new_password')}}">
                                            <x-input-error :messages="$errors->get('newPassword')" class="mt-2 text-danger" />
                                        </div>

                                        <!-- Form Group (last name)-->
                                        <div class="col-md-12 mb-3">
                                            <label class="small mb-1" for="inputLastName">Confirm Password</label>
                                            <input name="confirmPassword" class="form-control"
                                                   id="confirmPassword" type="password"
                                                   value="{{old('confirmPassword')}}">
                                            <x-input-error :messages="$errors->get('confirmPassword')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->

                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- content-main end// -->
@endsection
