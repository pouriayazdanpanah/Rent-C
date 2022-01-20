<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\UniqueCode;
use App\User;use Illuminate\Http\Request;


class VerifyTokenController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getToken(Request $request)
    {
        if ( ! $request->session()->has('auth')){
            return redirect('/');
        }
        $request->session()->reflash();
        return view('auth.verify_token');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postToken(Request $request)
    {

        if (!$request->session()->has('auth'))
        {
            return redirect('/');
        }

        $user = User::findOrFail($request->session()->get('auth.user_id'));

        $status = UniqueCode::verifyCode($request->token,$user);

        if (!$status)
        {
            alert()->error('The entered code is incorrect','code incorrect')->autoclose(3000);

            return redirect(route('login'));
        }

        if (auth()->loginUsingId($user->id,request()->session()->get('auth.remember')))
        {
            $user->uniqueCode()->delete();

            if ($user->isExpectation())
            {
                $user->markEmailAsVerified();
            }

            return redirect(route('home'));
        }

        return redirect(route('login'));
    }
}
