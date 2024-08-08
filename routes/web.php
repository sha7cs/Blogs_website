<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\BlogController;

//backend
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\AppController;
use App\Http\Controllers\backend\WrittersController;
use App\Http\Controllers\backend\B_LoginController;
use App\Http\Controllers\backend\B_BlogController;

Route::get('/',  [BlogController::class,'showlimited']);

Route::get('/blog/{id}',[BlogController::class,'show2']);
Route::get('/blogs', [BlogController::class,'showblogs']);
Route::post('/login', [LoginController::class,'login']);
Route::get('/login',[LoginController::class,'index']);


// Route::get('/login',[B_LoginController::class,'create'])->name('login');
// Route::post('/login',[B_LoginController::class,'login']); 

Route::post('/logout', [LoginController::class, 'logout']);

//////frontend
Route::prefix('front-end')->middleware(['user-auth'])->group(function () {
    // Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/addblog', [BlogController::class, 'create']);
    Route::post('/addblog', [BlogController::class, 'store']);
    Route::get('/myblogs/{user_id}', [BlogController::class, 'show'])->name('front-end.myblogs.show');
    Route::get('/blog/{id}', [BlogController::class, 'show2']);
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
    Route::patch('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [BlogController::class, 'delete']);
    
    ////profile
    // Route::get('/profile/{user_id}', [BlogController::class, 'profile'])->name('front-end.profile');
    Route::get('/profile/{user_id}', [LoginController::class, 'profile'])->name('front-end.profile');
    Route::get('/profile/{user_id}/edit', [LoginController::class, 'edit'])->name('user.edit');
    Route::put('/profile/{user_id}/edit', [LoginController::class,'update'])->name('update');
});

Route::get('front-end/blogs', [BlogController::class, 'showblogs']);
/////////////////////////////////// backend
Route::prefix('Back-end')->middleware(['admin-auth'])->group(function (){
    Route::get('/dashboard',[AppController::class,'index']);
    //writters page
    Route::get('/writters',[WrittersController::class,'index']);
    Route::get('/writters/create',[WrittersController::class,'create']);
    Route::post('/writters/store',[WrittersController::class,'store']);
    //blogs page
    Route::get('/blogs',[B_BlogController::class,'index']);
    Route::get('/blogShows/{id}',[B_BlogController::class,'show']);
    Route::get('/blogShows/{id}/Edit',[B_BlogController::class,'edit']);
    Route::patch('/blogsUpdate/{id}',[B_BlogController::class,'update']);
    Route::delete('/blogsDelete/{id}',[B_BlogController::class,'delete']);
    //log out 
    Route::get('/logout',[B_LoginController::class,'logout'])->name('logout');
    //Edit profile 
    Route::get('/UserProfile',[ProfileController::class,'index']);
    Route::get('/UserProfile/{id}',[ProfileController::class,'show']);
    Route::get('/UserProfile/{id}/edit',[ProfileController::class,'edit']);
    Route::patch('/UserProfile/{id}',[ProfileController::class,'updateProfile']);
    Route::put('/blogs/{id}/accept', [WrittersController::class, 'accept'])->name('blogs.accept');
    Route::put('/blogs/{id}/reject', [WrittersController::class, 'reject'])->name('blogs.reject');
});


Route::get('/contact', function(){
    return view('frontend.layouts.contact');
});
Route::get('/register', function(){
    return view('frontend.layouts.register');
});
Route::get('/reset', function(){
    return view('frontend.layouts.reset');
});

Route::post('/register', [LoginController::class, 'register']);
