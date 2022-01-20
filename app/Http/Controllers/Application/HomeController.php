<?php

namespace App\Http\Controllers\Application;

use App\Categorie;
use App\Feature;
use App\Http\Controllers\Controller;
use App\Product;
use App\PropertyWeight;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $features = Feature::all();
        $categories = Categorie::all();
        $maxPrice = Product::all()->max('price');
        $minPrice = Product::all()->min('price');

        return view('app.home', compact('features','categories','maxPrice','minPrice'));

    }
}
