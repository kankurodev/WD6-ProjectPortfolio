<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class SocialAuthController extends Controller
{
    public function redirect($service) {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service) {
        $socialUser = Socialite::driver($service)->stateless()->user();


        $findUser = User::where('email', $socialUser->email)->first();
        if ($findUser) {
            Auth::login($findUser);
            return redirect('/');
        } else {
            $user = new User;
            $user->name = $socialUser->name;
            $user->email = $socialUser->email;
            $user->password = Hash::make($socialUser->token);
            $user->save();

            Auth::login($user);
            return redirect('/');
        }
    }
}
