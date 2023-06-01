<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\NewOrder;
// use App\Events\MyEvent;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* ---------------------- Auth -------------------*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('update_trash','ApiController@update_trash');

Route::post('change_main_power_source','ApiController@change_main_power_source');
Route::post('change_door_status','ApiController@change_door_status');
Route::post('change_overload','ApiController@change_overload');
Route::post('change_trash_level','ApiController@change_trash_level');
Route::post('change_sanitizer_level','ApiController@change_sanitizer_level');



