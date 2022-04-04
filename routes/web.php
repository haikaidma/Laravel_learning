<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\VerificationControllerr;
use App\Http\Controllers\ForgotPasscontroller;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasscontroller;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth','is_verify_email'])->group(function(){
    Route::get('/list-user', [Usercontroller::class, 'list'])->name('list.user');
    Route::get('/delete-user/{id}', [Usercontroller::class, 'getDelete'])->name('delete');
    Route::match(['get', 'post'], '/update-user/{id}', [Usercontroller::class, 'getUpdate'])->name('update');
    // Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify', [VerificationControllerr::class, 'show'])->name('verification.notice');
    Route::match(['get', 'post'], '/post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/show/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/post/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comments.store');
});
Route::get('/email/verify/{token}', [VerificationControllerr::class, 'verifyAccount'])->name('user.verify');



Route::match(['get', 'post'], '/login-user', [Logincontroller::class, 'Login'])->name('login.user');
Route::get('/logout', [Logincontroller::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/register-user', [Registercontroller::class, 'Register'])->name('add');
// Route::get('/listuser', [Usercontroller::class, 'list'])->name('listuser')->middleware('auth');
Route::match(['get', 'post'], '/forgot-password',  [ForgotPasscontroller::class, 'forgotpass'])->name('forgotpassword');
Route::match(['get', 'post'], '/reset-password',  [ResetPasscontroller::class, 'resetpass'])->name('resetpassword');

// Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
// Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
// Route::match(['get', 'post'], '/post/create', [PostController::class, 'create'])->name('post.create');
// Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
// Route::get('/post/show/{id}',[PostController::class, 'show'])->name('posts.show');
// Route::post('/comment/store', [CommentController::class, 'store'])->name('comments.store');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
