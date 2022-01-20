<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        $products = Auth::user()->products()->get();

        $commentNumber = 0;
        foreach ($products as $product)
        {
          $commentNumber +=$product->comments->count();
        }

        $view_count = 0;
        foreach ($products as $product)
        {
            $view_count += $product->view_count;
        }

        $reservationCount = Auth::user()->reservation()->count();

        return view('host.home',compact('view_count','products' , 'commentNumber','reservationCount'));
    }
}
