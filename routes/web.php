<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
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
Route::middleware(['auth', 'role:admin'])->group(function () {
    // User is authentication and has admin role
    Route::get('/dashboard', function () {
        return view('admin_master');
    })->name('dashboard');
});
//
Route::get('/home', function () {
    dd(Auth::user());
});

// for contact form
Route::get('/contact', [ContactController::class,'index'])->name('contact.show');
Route::get('/contact/{contact}', [ContactController::class,'destroy'])->name('contact.destroy');

//for blog post
Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show'); //shows a single post
Route::get('/blog/create/post', [BlogPostController::class, 'create'])->name('blog.create'); //shows create post form
Route::post('/blog/create/post', [BlogPostController::class, 'store'])->name('blog.store'); //saves the created post to the databse
Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('blog.edit'); //shows edit post form
Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update'])->name('blog.update'); //commits edited post to the database 
Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog.destroy'); //deletes post from the database
