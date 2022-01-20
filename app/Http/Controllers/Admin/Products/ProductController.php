<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('approved' , 0)->paginate(15);

        return view('admin.product.all',compact('products'));
    }
    public function approved()
    {
        $products = Product::where('approved' , 1)->paginate(15);

        return view('admin.product.approved',compact('products'));
    }

    public function show(Product $product)
    {
        $user = $product->user;

        $images = $product->image()->get();

        $address = $product->address;

        $bedInfos= $product->bedInfos()->get();

        return view('admin.product.show',compact('product','user','images','address' , 'bedInfos'));
    }

    public function approve(Product $product){
        if (!is_null($product->bookingDate))
        {
            $product->update(['approved' => 1]);
            return back();
        }
        alert()->error("This House don't set booking date","Error")->autoclose(3000);
        return back();

    }
    public function unapproved(Product $product){
        $product->update(['approved' => 0]);
        return back();
    }
}
