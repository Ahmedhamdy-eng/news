<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    
     'namespace' => 'API', 
    // 'middleware'=>'cors',
], function () {

   Route::get('get-news','HomeController@getNews');
   Route::get('get-category','HomeController@getCategory');
   Route::get('get-category-news/{id}','HomeController@getCategoryNews');
   Route::get('get-comments/{id}','HomeController@getComments');
   Route::post('send-comments/{id}','HomeController@sendComments');
  });