@props(['userAccount'])
<div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="change_password-tab">
    <div class="card">
        <div class="card-header">
            <h5>Account Details</h5>
        </div>
        <div class="card-body">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{route('user.profile.password_update')}}">
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

