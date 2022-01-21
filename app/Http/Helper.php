<?php

use Illuminate\Support\Facades\Route;
use App\Product;

if (! function_exists('isActive'))
{
    function isActive($key , $className = 'active')
    {
        if (is_array($key))
        {
            return in_array(Route::currentRouteName() , $key ) ? $className : ' ';
        }

        return Route::currentRouteName() == $key ? $className : ' ';
    }
}
function test(){
    echo 'hello world';
}
if (! function_exists('get_static_btn_option'))
{
    function render_btn($slug , $userId): string
    {
        $product = Product::whereSlug($slug)->first();

        $is_favorite = $product->favorite()->where('user_id', $userId)->get();

        if (!($is_favorite->isEmpty())){
            return '<h5> <i class="fa fa-bookmark text-secondary pointer" data-type="0" data-slug="'.$slug.'"></i></h5>';
        }
        return '<h5> <i class="far fa-bookmark text-secondary pointer" data-type="1" data-slug="'.$slug.'"></i></h5>';
    }
}

function render_image_cover_URL_attachment_id($id): string
{

    $product = Product::find($id);
//    dd($product);
    $image_cover = $product->image()->whereId($product->image_cover)->first();
    if (!is_null($image_cover)){
        return $image_cover->url;
    }
    return asset('/img/application/preview/undraw_Images_re_0kll.svg');

}

function get_session_user_agent($item): string
{
    return explode(";",explode(')',explode('(',$item)[1])[0])[0];
}

function is_session_set($item): bool
{
    if (\Illuminate\Support\Facades\Session::getId() === $item){
        return true;
    }
    return false;
}

function profileImage($userId): string
{
    $user = \App\User::find($userId);
    if (is_null($user->image)){
        return asset('/img/application/profile/undraw_profile_pic_ic5t.svg');
    }
    return asset($user->image->url);
}

function get_static_option($key)
{
    $option_name = $key;

    $value = \Illuminate\Support\Facades\Cache::remember($option_name ,5000 ,function () use ($option_name){
        return \App\StaticOption::whereOption_name($option_name)->first();
    });

   return !empty($value) ? $value->option_value:null;

}


