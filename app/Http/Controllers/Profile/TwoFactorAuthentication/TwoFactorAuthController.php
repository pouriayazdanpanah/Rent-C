<?php

namespace App\Http\Controllers\Profile\TwoFactorAuthentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\TwoStepVerificationRequest;
use App\Notifications\UniqueCode as SMSTokenNotification;
use App\UniqueCode;
use Illuminate\Http\Request;

class TwoFactorAuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('profile.twoFactor');
    }

    /**
     * @param TwoStepVerificationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function twoStepVerification(TwoStepVerificationRequest $request)
    {
        $data = $request->validated();

        if ($this->isRequestTypeOff($data)){
            $request->user()->update([
                'two_factor_type' => 'off',

            ]);
            alert()->warning('تاییددو مرحله ای غیر فعال شد برای حفاظت بیشتر لطفا فعال کنید!','اخطار!')->persistent('بسیار خوب');
        }

        if ($this->isRequestTypeSMS($data)){

            if ($this->invalidPhoneNumber($data)){

                return $this->createCodeAndSendSMS($request, $data);
            }
            else{

                $request->user()->update([
                    'two_factor_type' => 'sms',
                ]);

                alert()->success('تایید دو مرحله ای با فعال گردید','عملیات موفق آمیز بود');
            }
        }

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function phoneVerify(Request $request)
    {
        if (!$request->session()->has('phone')){
            return redirect(route('profile.2factor'));
        }

        $request->session()->reflash();

        return view('profile.phone_verify');
    }


    /**
     * @param array $data
     * @return bool
     */
    public function isRequestTypeOff(array $data): bool
    {
        return $data['type'] === 'off';
    }

    /**
     * @param array $data
     * @return bool
     */
    public function isRequestTypeSMS(array $data): bool
    {
        return $data['type'] === 'sms';
    }

    /**
     * @param array $data
     * @return bool
     */
    public function invalidPhoneNumber(array $data): bool
    {
        return auth()->user()->phone !== $data['phone'];
    }

    /**
     * @param TwoStepVerificationRequest $request
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createCodeAndSendSMS(TwoStepVerificationRequest $request, array $data)
    {
        //store phone number with session
        $request->session()->flash('phone', $data['phone']);

        //generate unique code for SMS
        $code = UniqueCode::generateCode($request->user());

        //send token with SMS
        $request->user()->notify(new SMSTokenNotification($code, $data['phone']));

        return redirect(route('phone.verify'));
    }

}
