<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin'], function () {
    Route::get('login','AuthController@index')->name('login');
    Route::post('post_login','AuthController@login')->name('post_login');


    //******* after login *******
    Route::group(['middleware' => 'admin'], function () {

        Route::get('logout','AuthController@logout')->name('logout');

        Route::get('/',function (){
            return redirect('admin/home');
        })->name('/');
        Route::get('home','HomeController@index')->name('home');
        Route::post('update_notification_read','HomeController@update_notification_read')->name('update_notification_read');

        ################################### Profile ##########################################
        Route::get('profile','AdminController@profile')->name('profile');
        Route::post('update-profile','AdminController@update_profile')->name('profile.update');


        ################################### Admins ##########################################
        Route::resource('admins','AdminController');
        Route::post('multi_delete_admins','AdminController@multiDelete')->name('admins.multiDelete');

        ################################### users ##########################################
        Route::resource('users','UserController');
        Route::post('multi_delete_users','UserController@multiDelete')->name('users.multiDelete');
        Route::get('block_user/{id}','UserController@block')->name('users.block');

        ################################### prices ##########################################
        Route::resource('prices','PriceController');
        Route::post('multi_delete_prices','PriceController@multiDelete')->name('prices.multiDelete');

        ################################### cities ##########################################
        Route::resource('cities','CityController');
        Route::post('multi_delete_cities','CityController@multiDelete')->name('cities.multiDelete');

        ################################### regions ##########################################
        Route::resource('regions','RegionController');
        Route::post('multi_delete_regions','RegionController@multiDelete')->name('regions.multiDelete');

        ################################### activities ##########################################
        Route::resource('activities','ActivityController');
        Route::post('multi_delete_activities','ActivityController@multiDelete')->name('activities.multiDelete');

        ################################### settings ##########################################
        Route::resource('settings','SettingController');


        ################################### trashes ##########################################
        Route::resource('trashes','TrashController');
        Route::get('trash_details/{id}','TrashController@trash_details')->name('trash_details');
        Route::post('multi_delete_trashes','TrashController@multiDelete')->name('trashes.multiDelete');
//        Route::get('/generate-barcode', 'TrashController@generate_barcode')->name('generate.barcode');

    });//end Middleware Admin



//    Route::fallback(function () {
//        return redirect('admin/home');
//    });
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('optimize:clear');
        return '<h1> cache cleared</h1>';
    });
});//end Prefix
