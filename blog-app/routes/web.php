<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog;


Route::get('/{id?}',[Blog::class,'blog'])->name("blog");

Route::group(['prefix' => 'blog'],function(){
    Route::get('/detail/{id}',[Blog::class,'detail'])->name("detail");
    Route::get('/contact',[Blog::class,'contacts'])->name("contact");
    Route::get('/archive/{id?}',[Blog::class,'archive'])->name("archive");
});




// Route::post('/login_validation',[Auth::class,'login_validation'])->name("login_validation");
// Route::get('/logout',[Auth::class,'logout'])->name("logout");

// Route::get('/register',[Auth::class,'register'])->name("register");
// Route::post('/register_validation',[Auth::class,'register_validation'])->name("register_validation");

// Route::get('/dashboard',[Dashboard::class,'dashboard'])->name("dashboard");




// Route::group(['prefix' => 'category',  'middleware' => 'myauth'],function(){
//     Route::get('/add',[Category::class,'add'])->name("category_add");
//     Route::get('/edit/{id}',[Category::class,'edit'])->name("category_edit");
//     Route::get('/list',[Category::class,'list'])->name("category_list");
    
//     Route::post('/add_category',[Category::class,'add_category'])->name("add_category");
//     Route::post('/edit_category',[Category::class,'edit_category'])->name("edit_category");
//     Route::post('/delete_category',[Category::class,'delete_category'])->name("delete_category");
//     Route::post('/list_category',[Category::class,'list_category'])->name("list_category");
// });


// Route::group(['prefix' => 'post',  'middleware' => 'myauth'], function(){
//     Route::get('/add',[Posts::class,'add'])->name("post_add");
//     Route::get('/edit/{id}',[Posts::class,'edit'])->name("post_edit");
//     Route::get('/list',[Posts::class,'list'])->name("post_list");
    
//     Route::post('/add_post',[Posts::class,'add_post'])->name("add_post");
//     Route::post('/edit_post',[Posts::class,'edit_post'])->name("edit_post");
//     Route::post('/delete_post',[Posts::class,'delete_post'])->name("delete_post");
//     Route::post('/list_post',[Posts::class,'list_posts'])->name("list_posts");
// });




