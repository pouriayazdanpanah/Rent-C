<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    auth()->loginUsingId(5);
//    return redirect(\route('login'));
});

Auth::routes(['verify' => true]);

Route::get('/home', 'Application\HomeController@index')->name('home');

Route::prefix('/auth')->namespace('Auth')->group(function (){

    Route::get('/google','GoogleAuthController@redirect')->name('google.auth');
    Route::get('/google/callback','GoogleAuthController@callback');

    Route::get('/token','VerifyTokenController@getToken')->name('token.auth');
    Route::post('/token','VerifyTokenController@postToken');

    Route::post('phone-login','LoginPhoneNumberController@login')->name('phone.auth.login');
    Route::post('phone-register','RegisterPhoneNumberController@register')->name('phone.auth.register');
});

Route::prefix('/profile')->namespace('Profile')->middleware(['auth','verified'])->group(function (){

    Route::get('/','IndexController@index')->name('profile');

    Route::get('/two-step-verification','TwoFactorAuthentication\TwoFactorAuthController@index')->name('profile.twofactorauth.index');
    Route::post('/two-step-verification','TwoFactorAuthentication\TwoFactorAuthController@twoStepVerification');

    Route::get('/two-step-verification/phone','TwoFactorAuthentication\TwoFactorAuthController@phoneVerify')->name('phone.verify');
    Route::post('/two-step-verification/phone','TwoFactorAuthentication\VerifyTokenController@verifyToken');

    Route::resource('/personal-info','PersonalInfoController')
        ->only(['index', 'update'])
        ->parameters(['personal-info' => 'user']);
    Route::post('/personal-info/upload-image','PersonalInfoController@uploadImage')->name('personal-info.image');
    Route::delete('/personal-info/delete-image','PersonalInfoController@deleteImage')->name('personal-info.delete.image');
    Route::get('/security','SecurityController@index')->middleware('password.confirm')->name('profile.security');
    Route::put('/security/update-password/{user}','SecurityController@update')->name('profile.security.update');
    Route::delete('/security/delete-session/{id}','SecurityController@destroy')->name('profile.security.delete.session');
    Route::get('/bookmark' , 'BookmarkController@index')->name('profile.bookmark');

});

Route::namespace('Application')->middleware(['auth','verified'])->group(function (){

    Route::get('/products','CategoriesController@getData')->name('categories');
    Route::get('/product/{product}','SingleProductController@index')->name('product');
    Route::get('/product/{product}/instance','InstanceController@index')->name('product.instance');
    Route::post('/comment/{product}','SingleProductController@comment')->name('comment');
    Route::post('/expense/{product}' , 'SingleProductController@expense');
    Route::post('/bookmark/{product}' , 'BookmarkController@index');
    Route::post('/message/user/{user}/product/{product}','MessageController@sendMessage')->name('message');
    Route::post('/product/{product}/instance','InstanceController@getInformation');

});

Route::get('/preview','Host\indexController')->name('become-host');
Route::get('/preview/start','Host\indexController@start')->name('become-host.start');
Route::get('/test',function (){
    echo 'this is route test';
});




