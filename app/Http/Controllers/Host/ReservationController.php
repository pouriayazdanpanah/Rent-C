<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $products = Auth::user()->products()->paginate(15);

        return view('host.reservation',compact('products'));
    }
}
