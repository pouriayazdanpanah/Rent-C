<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class GoogleAuthController extends Controller
{
    use TwoFactorAuthentication;

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email',$googleUser->email)->first();

        if (! $user)
        {
            $user = User::create([
                'name' => $googleUser->name,
                'last_name' =>'',
                'email'=> $googleUser->email,
                'two_factor_type' => 'off',
                'password' => bcrypt(\Str::random(18)),
            ]);
        }

        if ( ! $user->hasVerifiedEmail())
        {
            $user->markEmailAsVerified();
        }

        auth()->loginUsingId($user->id);

        return $this->loggedIn($request,$user)?:redirect('home');

    }



}
