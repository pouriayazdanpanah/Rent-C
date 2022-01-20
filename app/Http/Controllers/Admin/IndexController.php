<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * show admin panel
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $users = User::all();
        $hostNumber = User::where('is_host',1)->count();
        $customerNumber = User::where('is_host',0)->count();
        $viewCount = Product::ViewCount();
        $products = Product::all();
        return view('admin.index',compact('users','hostNumber','customerNumber','viewCount','products'));
    }
}
