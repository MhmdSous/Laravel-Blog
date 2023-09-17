<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// midlleware for auth
Route::middleware(['auth','role:admin'])->group(function () {
    // User is authentication and has admin role
    Route::get('/dashboard', function ( ){
        return view('admin_master');
    })->name('dashboard');
});
//
Route::get('/home', function () {
dd(Auth::user());
});


Route::get('/contact', function () {
    $contacts = App\Models\Contact::all();
    return view('contact.index',compact('contacts'));
});
//
