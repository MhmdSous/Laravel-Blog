<?php

use App\Http\Controllers\Api\BlogControllerApi;
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


//for contact form
Route::post("contact/store", [ContactFormController::class, "store"]);
Route::post("contact", [ContactFormController::class, "index"]);

// for blog post
// Index route with optional 'lang' parameter
Route::get('/blog', [BlogControllerApi::class, 'index']);
// Show route with optional 'lang' parameter
Route::get('/blog/{id}', [BlogControllerApi::class, 'show']);
Route::post('/blog/store', [BlogControllerApi::class, 'store']);
Route::put('/blog/update/{id}', [BlogControllerApi::class, 'update']);
Route::delete('/blog/delete/{id}', [BlogControllerApi::class, 'destroy']);

