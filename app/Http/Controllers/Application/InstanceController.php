<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstanceController extends Controller
{
    public function index(Product $product)
    {
        $address = $product->address;
        $user = $product->user;

        return view('app.instance',compact('product','address','user'));

    }
    function getInformation(Request $request , Product $product)
    {

        $reservation =Auth::user()->reservation()->create([
            'arrived_at' => $request->Date_Start,
            'departed_at' => $request->Date_End,
            'guests' => $request->Number_of_guests,
            'total_price' => $request->Total_price,
        ]);

        $product->reservation()->sync($reservation->id);
        alert()->success('This place reserved','Success');

        return redirect(route('product',$product->slug));
    }
}
