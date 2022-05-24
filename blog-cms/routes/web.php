<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\AuthUser;
use App\Http\Controllers\Category;
use App\Http\Controllers\Posts;
use App\Http\Controllers\UserManagement;


// Route::get('/', function () {
   
// });

// Route::get('/',[AuthUser::class,'login'])->name("login")->middleware('guest');
Route::post('/login_validation',[AuthUser::class,'login_validation'])->name("login_validation");
Route::post('/register_validation',[AuthUser::class,'register_validation'])->name("register_validation");
Route::get('/logout',[AuthUser::class,'logout'])->name("logout");

Route::get('/new_user',[AuthUser::class,'register'])->name("register")->middleware("guest");

Route::group(['middleware' => 'guest'],function(){
    Route::get('/',[AuthUser::class,'login'])->name("login");
});


Route::get('/dashboard',[Dashboard::class,'dashboard'])->name("dashboard")->middleware('auth');



//Route::prefix('category')->group(function () {
Route::group(['prefix' => 'category',  'middleware' => 'auth'],function(){
    Route::get('/add',[Category::class,'add'])->name("category_add");
    Route::get('/edit/{id}',[Category::class,'edit'])->name("category_edit");
    Route::get('/list',[Category::class,'list'])->name("category_list");
    
    Route::post('/add_category',[Category::class,'add_category'])->name("add_category");
    Route::post('/edit_category',[Category::class,'edit_category'])->name("edit_category");
    Route::post('/delete_category',[Category::class,'delete_category'])->name("delete_category");
    Route::post('/list_category',[Category::class,'list_category'])->name("list_category");
});

Route::group(['prefix' => 'user_management',  'middleware' => ['auth','role:Super-Admin']],function(){
    Route::get('/add',[UserManagement::class,'add'])->name("user_add");
    Route::get('/edit/{id}',[UserManagement::class,'edit'])->name("user_edit");
    Route::get('/list',[UserManagement::class,'list'])->name("user_list");
    
    Route::post('/add_user',[UserManagement::class,'add_user'])->name("add_user");
    Route::post('/edit_user',[UserManagement::class,'edit_user'])->name("edit_user");
    Route::post('/delete_user',[UserManagement::class,'delete_user'])->name("delete_user");
    Route::post('/list_users',[UserManagement::class,'list_user'])->name("list_user");
});

// Route::prefix('post')->group(function () {
Route::group(['prefix' => 'post',  'middleware' => 'auth'], function(){
    Route::get('/add',[Posts::class,'add'])->name("post_add");
    Route::get('/edit/{id}',[Posts::class,'edit'])->name("post_edit");
    Route::get('/list',[Posts::class,'list'])->name("post_list");
    
    Route::post('/add_post',[Posts::class,'add_post'])->name("add_post");
    Route::post('/edit_post',[Posts::class,'edit_post'])->name("edit_post");
    Route::post('/delete_post',[Posts::class,'delete_post'])->name("delete_post");
    Route::post('/list_post',[Posts::class,'list_posts'])->name("list_posts");
});



