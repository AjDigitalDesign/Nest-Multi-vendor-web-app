<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserDashboard(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user_id = Auth::id();
        $user_data = User::with(['profile'])->find($user_id);
        return view('dashboard', compact('user_data'));
    }


    public function login()
    {
        return view('auth.login');
    }

    public function profileStore(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = User::find($user_id);


        $profile = $data->profile;

        if($request->hasFile('profile_image')){
            $requested_file = $request->file('profile_image');
            $filename = date('YmdHi').$requested_file->getClientOriginalName();
            $requested_file->move(public_path('uploads/users/images/profile'), $filename);
            $profile->profile_image = $filename;
            $profile->save();
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $profile->phone_number = $request->phone_number;
        $profile->save();
        $data->save();

        $notification = 'Profile updated successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->back();
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
            return redirect()->route('admin.profile');
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
        return redirect()->route('user.login');
    }
}
