<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController; //UserController

use App\Http\Controllers\PostController; //PostController

use App\Models\Post; //Post Model (Database)

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
    $posts = [];
    if(auth()->check()) {
        $posts = auth()->user()->userPosts()->latest()->get();
    }
    //$posts = Post::where('user_id', auth()->id())->get();
    return view('home', ['posts' => $posts]);
});

//Register
Route::post('/register', [UserController::class, 'register']);

//Login
Route::post('/login', [UserController::class, 'login']);

//Logout
Route::post('/logout', [UserController::class, 'logout']);

//Blog Post
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'editPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);