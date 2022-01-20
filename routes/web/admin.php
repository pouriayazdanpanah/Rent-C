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
Route::get('/','IndexController')->name('home');

Route::resource('/permission','ACL\PermissionController');

Route::resource('/role','ACL\RoleController');

Route::get('/user/access-control-list/{user}','User\ACLController@create')->name('user.acl');
Route::post('/user/access-control-list/{user}','User\ACLController@store')->name('user.acl.store');

Route::resource('/user','User\UserController');

Route::get('/performance/recommender-action','Performance\RecommenderActionController@index')->name('recommender-action.index');
Route::patch('/performance/recommender-action/update','Performance\RecommenderActionController@updateWeight')->name('recommender-action.update');
Route::patch('/performance/recommender-action/situation','Performance\RecommenderActionController@recommenderSystemSituation')->name('recommender-action.situation');

Route::resource('performance/structure/feature','Performance\Structure\FeatureController')->except(['create','show','edit']);

Route::resource('performance/structure/category','Performance\structure\CategoryController')
    ->except(['create','show','edit'])
    ->parameters(['category' => 'categorie']);

Route::get('/comment/unapproved','CommentsController@unapproved')->name('comment.unapproved');

Route::resource('/comment','CommentsController')->except(['create','edie','store']);


Route::get('/product/all','Products\ProductController@index')->name('products');
Route::get('/product/approved','Products\ProductController@approved')->name('products.approved');
Route::get('/product/{product}','Products\ProductController@show')->name('product.show');
Route::get('/product-approve/{product}','Products\ProductController@approve')->name('product.approve');
Route::get('/product-unapproved/{product}','Products\ProductController@unapproved')->name('product.unapproved');
