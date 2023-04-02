<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $user = new User();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $profile = new Profile();
        if($request->hasFile('profile_image')){
            $requested_file = $request->file('profile_image');
            $filename = date('YmdHi').$requested_file->getClientOriginalName();
            $requested_file->move(public_path('uploads/users/images/profile'), $filename);
            $profile->profile_image = $filename;
        }

        $profile->street_address = $request->street_address;
        $profile->user_id = $user->id;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->zipcode = $request->zipcode;
        $profile->country = $request->country;
        $profile->phone_number = $request->phone_number;
        $profile->save();

        event(new Registered($user));

        Auth::login($user, $remember = true);


        $notification = 'Welcome successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);

        return redirect(RouteServiceProvider::HOME);
    }
}
