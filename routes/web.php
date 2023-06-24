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


Route::get('/change_language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'fr'])) {
//        abort(404);
        \Illuminate\Support\Facades\App::setLocale('en');
        session()->put('locale', 'en');
    }

    \Illuminate\Support\Facades\App::setLocale($locale);
    // Session
    session()->put('locale', $locale);

    return redirect()->back();
});
Route::group(['middleware' => 'language'], function () {
    Route::get('/','Web\HomeController@index')->name('welcome');
    Route::get('about','Web\HomeController@about')->name('about');

    Route::get('edit_profile','Web\AuthController@edit_profile')->name('edit_profile');
    Route::post('store_user','Web\AuthController@store_user')->name('users.store');
    Route::post('update_user','Web\AuthController@update_user')->name('users.update');
    Route::get('sign_up','Web\AuthController@sign_up')->name('sign_up');
    Route::get('login','Web\AuthController@login')->name('login');
    Route::post('user_validation', 'Web\AuthController@user_validation')->name('user_validation');
    Route::post('user_login', 'Web\AuthController@user_login')->name('user_login');
    Route::get('logout', 'Web\AuthController@logout')->name('logout');

    Route::get('get_city_regions','Web\AuthController@get_city_regions')->name('get_city_regions');

    Route::view('firebase','Web.firebase');
// Google login
    Route::get('login/google', 'Web\SocialLoginController@redirectToGoogle')->name('login.google');
    Route::get('login/google/callback', 'Web\SocialLoginController@handleGoogleCallback');

// Facebook login
    Route::get('login/facebook','Web\SocialLoginController@redirectToFacebook')->name('login.facebook');
    Route::get('login/facebook/callback','Web\SocialLoginController@handleFacebookCallback');

});


