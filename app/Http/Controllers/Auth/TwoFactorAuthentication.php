<?php


namespace App\Http\Controllers\Auth;


use App\Notifications\UniqueCode as SMSTokenNotification;
use App\UniqueCode;
use Illuminate\Http\Request;

trait TwoFactorAuthentication
{
    /**
     * @param Request $request
     * @param $user
     * @return bool|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loggedIn(Request $request,$user)
    {
        if ($user->twoStepVerificationOff())
        {

            auth()->logout();

            $request->session()->flash('auth',[

                'user_id' => $user->id,
                'using_sms' =>false,
                'remember' => $request->has('remember')
            ]);

            if ($user->twoStepVerificationSMS())
            {
                $this->operator($request, $user);

            }

            if ($user->isExpectation())
            {
                $this->operator($request, $user);
            }

            return  redirect(route('token.auth'));
        }
        return false;
    }

    /**
     * @param Request $request
     * @param $user
     * @return mixed
     */
    public function operator(Request $request, $user)
    {
        $request->session()->push('auth.using_sms', true);

        $code = UniqueCode::generateCode($user);

        $user->notify(new SMSTokenNotification($code, $user->phone));


    }
}
