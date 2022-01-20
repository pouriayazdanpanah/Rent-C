<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index(Request $request , Product $product)
    {
        $dataValidated = $request->validate([
            'favorite'=>['required'],
        ]);

        if ($dataValidated['favorite'] == 1)
        {
            $product->favorite()->create([
                'user_id' => auth()->user()->id,
                'favorite' => $dataValidated['favorite']
            ]);

            return response()->json([
                'status' => 'success',
                'favorite' => 1,
            ]);
        }
        $product->favorite()->delete();

        return response()->json([
            'status' => 'success',
            'favorite' => 0,
        ]);

    }
}
