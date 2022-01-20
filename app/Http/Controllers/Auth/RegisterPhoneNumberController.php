<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPhoneRequest;
use App\User;
use function HighlightUtilities\getAvailableStyleSheets;


class RegisterPhoneNumberController extends Controller
{
    public function register(RegisterPhoneRequest $request)
    {
        $validateDate = $request->validated();

        $this->create($validateDate);

        return redirect(route('login'));
    }

    /**
     * @param array $validateDate
     */
    public function create(array $validateDate): void
    {
        User::create([
            'name' => $validateDate['p-name'],
            'last_name' => $validateDate['p-last-name'],
            'phone' => $validateDate['phone'],
            'two_factor_type' => 'expectation',
            'email' => '',
            'password' => ''
        ]);
    }


}
