<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/','indexController');

Route::get('/','HomeController')->name('home');

Route::prefix('/registration')->group(function(){
    Route::get('/information','RegistrationController@information')->name('registration.information');
    Route::get('/price/','RegistrationController@price')->name('registration.price');
    Route::get('/bedroom/','RegistrationController@bedroom')->name('registration.bedroom');
    Route::get('/features/','RegistrationController@features')->name('registration.features');
    Route::get('/location/','RegistrationController@location')->name('registration.location');
    Route::get('/upload-image/','RegistrationController@uploadImage')->name('registration.upload-image');
    Route::get('/continue/{product}','RegistrationController@continue')->name('registration.continue');

    Route::post('/information','RegistrationController@createInformation')->name('registration.create.information');
    Route::post('/price','RegistrationController@createPrice')->name('registration.create.price');
    Route::post('/bedroom','RegistrationController@createBedroom')->name('registration.create.bedroom');
    Route::post('/features','RegistrationController@createFeatures')->name('registration.create.features');
    Route::post('/location','RegistrationController@createLocation')->name('registration.create.location');
    Route::post('/find-location','RegistrationController@findLocation')->name('registration.create.find-location');
    Route::post('/upload-image-cover','RegistrationController@uploadImageCover')->name('registration.upload-image-cover');
    Route::post('/upload-image-gallery','RegistrationController@uploadImageGallery')->name('registration.upload-image-gallery');
    Route::post('/completed','RegistrationController@completed')->name('registration.completed');

});

Route::resource('/listing','ListingController')->parameters(['listing'=>'product']);
Route::prefix('/listing')->group(function(){
    Route::get('/{product}/edit_information','ListingController@editInformation')->name('listing.edit-information');
    Route::get('/{product}/edit_price','ListingController@editPrice')->name('listing.edit-price');
    Route::get('/{product}/edit_bedroom/','ListingController@editBedroom')->name('listing.edit-bedroom');
    Route::get('/{product}/edit_features/','ListingController@editFeatures')->name('listing.edit-features');
    Route::get('/{product}/edit_location/','ListingController@editLocation')->name('listing.edit-location');

    Route::patch('/{product}/update_information','ListingController@updateInformation')->name('listing.update-information');
    Route::patch('/{product}/update_price','ListingController@updatePrice')->name('listing.update-price');
    Route::patch('/{product}/update_bedroom/','ListingController@updateBedroom')->name('listing.update-bedroom');
    Route::patch('/{product}/update_features/','ListingController@updateFeatures')->name('listing.update-features');
    Route::patch('/{product}/update_date/','ListingController@updateDate')->name('listing.update-date');
    Route::patch('/{product}/update_location/','ListingController@updateLocation')->name('listing.update-location');
    Route::post('/find-location','ListingController@findLocation')->name('listing.update-location.find-location');

    Route::post('/{product}/update-image','ListingController@updateImage')->name('listing.update-image');
    Route::delete('/{product}/delete_product','ListingController@destroyProduct');
    Route::delete('/delete_image/{image}','ListingController@destroyImage');
});

Route::get('/reservation','ReservationController@index')->name('reservation');
