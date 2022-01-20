<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Mail\HostMessate;
use App\Notifications\ContactHost;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function sendMessage(Request $request,User $user,Product $product)
    {

        $host = $product->user;

        $userName = $user->name." ".$user->last_name;
        $host_name = $host->name." ".$host->last_name;

       if (!empty($host->phone)){
           $host->notify(new ContactHost($request->message,$userName,$request->phone,$host_name,$host->phone));
       }
        Mail::to($host->email)->send(new HostMessate($userName,$host_name,$user->email,$user->phone,$request->message));

    }
}
