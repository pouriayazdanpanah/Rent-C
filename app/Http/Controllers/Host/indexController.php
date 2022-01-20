<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function __invoke()
    {
        return view('host.welcome');
    }

    public function start()
    {
        Auth::user()->update(['is_host' => 1]);
        return redirect(route('host.home'));
    }
}
