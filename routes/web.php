<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //Ini untuk Tes API
use App\Models\Post;



Route::get('/posts', function () {
    $posts = Post::all(); // ✅ Pakai Model, bukan Controller
    return view('posts', compact('posts'));
});


// Route::resource('posts', PostController::class); //Ini untuk Tes API

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
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});
