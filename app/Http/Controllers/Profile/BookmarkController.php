<?php

namespace App\Http\Controllers\Profile;

use App\Favorite;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $favorites = Favorite::whereUser_id(Auth::user()->id)->get();

        return view('profile.bookmark',compact('favorites'));

    }
}
