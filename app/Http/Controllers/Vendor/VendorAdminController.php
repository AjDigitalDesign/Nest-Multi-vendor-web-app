<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VendorAdminController extends Controller
{
    public function dashboard(){
        return view('vendor.dashboard.dashboard');
    }

    public function login()
    {
        return view('vendor.auth.login');
    }

    public function profile()
    {
        $user_id = Auth::id();
        $user_data = User::with(['profile'])->find($user_id);
        return view('vendor.dashboard.profile.profile', compact('user_data'));
    }

    public function profile_store(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = User::find($user_id);


        $profile = $data->profile;

        if($request->hasFile('profile_image')){
            $requested_file = $request->file('profile_image');
            $filename = date('YmdHi').$requested_file->getClientOriginalName();
            $requested_file->move(public_path('uploads/vendor/images/profile'), $filename);
            $profile->profile_image = $filename;
            $profile->save();
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $profile->street_address = $request->street_address;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->zipcode = $request->zipcode;
        $profile->country = $request->country;
        $profile->phone_number = $request->phone_number;
        $profile->save();
        $data->save();

        $notification = 'Profile updated successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->route('vendor.profile');
    }

    public function password()
    {
        return view('vendor.dashboard.profile.change_password');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->currentPassword, $hashedPassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newPassword);
            $users->save();

            $notification = 'Password changed successfully';
            noty()
                ->layout('topRight')
                ->addInfo($notification);
            return redirect()->route('vendor.profile');
        }else {
            $notification = "Old password doesn't match!";
            noty()
                ->layout('topRight')
                ->addInfo($notification);
            return redirect()->back();
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = 'You have been logout successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->route('vendor.login');
    }
}
