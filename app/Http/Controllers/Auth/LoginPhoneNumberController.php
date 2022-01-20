<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\UniqueCode as SMSTokenNotification;
use App\UniqueCode;
use App\User;
use Illuminate\Http\Request;

class LoginPhoneNumberController extends Controller
{
    use TwoFactorAuthentication;

    public function login(Request $request)
    {
        $validatedata = $request->validate([
           'phone' => ['required' , 'regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/','exists:users,phone'] ,
        ],['phone.exists' => 'The selected phone is invalid.Please Register your phone number']);

       $user = User::where('phone',$validatedata['phone'])->first();

       if (!($this->loggedIn($request,$user)))
       {
           alert()->warning('Not Active Phone number' , 'Warning');
           return redirect('/login');
       }
    }
}
