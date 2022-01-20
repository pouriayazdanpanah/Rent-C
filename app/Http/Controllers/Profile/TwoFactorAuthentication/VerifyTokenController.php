<?php

namespace App\Http\Controllers\Profile\TwoFactorAuthentication;

use App\Http\Controllers\Controller;
use App\UniqueCode;
use Illuminate\Http\Request;

class VerifyTokenController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function verifyToken(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        if (!$request->session()->has('phone')){
            return redirect(route('profile.2factor'));
        }

        $status = Uniquecode::verifyCode($request->token,$request->user());

        if ($status){
            $request->user()->uniqueCode()->delete();
            $request->user()->update([
                'two_factor_type' => 'sms',
                'phone' => $request->session()->get('phone')
            ]);
            alert()->success('تایید دو مرحله ای با موفقیت انجام شد','عملیات موفق آمیز بود');
        }
        else{
            alert()->error('تایید دو مرحله ای با موفقیت انجام نشد','خطا')->autoclose(3000);
        }
        return redirect(route('profile.twofactorauth.index'));
    }
}
