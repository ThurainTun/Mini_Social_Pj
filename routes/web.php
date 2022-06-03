<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactMessage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    //admin route
    Route::middleware('admin')->group(function(){
        Route::controller((AdminController::class))->group(function () {
            Route::get('/admin', 'admin')->name('admin');
            Route::get('/admin/manage-premium-user', "manage_premium_user")->name('manage-premium-user');
            Route::get('/admin/manage-premium-use/delete/{id}',"delete_user")->name('delete-user');
            Route::get('/admin/manage-premium-use/edit/{id}',"edit_user")->name('edit-user');
            Route::post('/admin/manage-premium-use/update/{id}',"update_user")->name('update-user');
            Route::get('/admin/manage-contact-us', "manage_contact_us")->name('manage-contact-us');
            Route::get('/admin/manage-contact-us/delete/{id}',"delete_message")->name('delete-message');
            Route::get('/admin/manage-contact-us/update/{id}',"update_message")->name('update-message');
            Route::post('/admin/manage-contact-us/update/{id}',"update_message_data")->name('update-message-data');
        });
    });

    // post route
    Route::controller(PostController::class)->group(function () {
        Route::get('/posts/{id}', 'postsById')->name('postsById');
        Route::middleware('premiumUser')->group(function(){
            Route::get('/posts/update/{id}', 'postsUpdate')->name('postsUpdate');
            Route::get('/posts/delete/{id}', 'postsDelete')->name('postsDelete');
            Route::post('/posts/update/{id}', 'postsUpdateData')->name('postsUpdateData');
        });
    });

    // home routes
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('auth');
        Route::get('/user/create-post', 'create_post')->name('create-post');
        Route::post('/user/create-post', 'create_post_data')->name('create-post-data');
        Route::get('/user/contact-us', 'contact_us')->name('contact-us');
    });
    //contact message route
    Route::controller(ContactMessage::class)->group(function () {
        Route::post('/user/contact-us', 'contact_us_data')->name('contact-us-data');
    });
    //user route
    Route::controller(AuthController::class)->group(function () {
        Route::get('/user/profile', 'user_profile')->name('user-profile');
        Route::get('/user/edit-profile', 'edit_user_profile')->name('edit-user-profile');
        Route::post('/user/edit-profile', 'post_edit_user_profile')->name('post-edit-user-profile');
        Route::get('/logout', 'logout')->name('logout');
    });
});

Route::middleware('guest')->group(function () {
    //auth route
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'post_login')->name('login-post');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'post_register')->name('register-post');
    });
});
