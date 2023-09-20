<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactFormController;
use App\Http\Controllers\BlogPostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("users.login","login");
//for contact form
Route::post("contact/store",[ContactFormController::class,"store"]);
Route::post("contact/",[ContactFormController::class,"index"]);

// for blog post
// Route::apiResource("blog","BlogPostController@index");
// Route::apiResource("blog/create/post","BlogPostController@create");
// Route::apiResource("blog/create/post","BlogPostController@store");
// Route::apiResource("blog/{blogPost}/edit","BlogPostController@edit");
// Route::apiResource("blog/{blogPost}/edit","BlogPostController@update");
// Route::apiResource("blog/{blogPost}","BlogPostController@show");
// Route::apiResource("blog/{blogPost}","BlogPostController@destroy");
