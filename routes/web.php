<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Public Routes

    // Homepage
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');

    // Single Image
    Route::get('/image/{image}', [HomepageController::class, 'singleImage'])->name('single.image');

    // Download Image
    Route::get('/download/{image}', [HomepageController::class, 'downloadImage'])->name('download.image');

    // About Page
    Route::get('/about', [HomepageController::class, 'aboutPage'])->name('about.page');

    // Search Page
    Route::post('/search', [HomepageController::class, 'searchEngine'])->name('search.page');

    // Tag Page
    Route::get('/tag/{tag}', [HomepageController::class, 'viewImagesWithTag'])->name('tag.images');

    // Author Page
    Route::get('/author/{author}', [HomepageController::class, 'authorPage'])->name('author.page');

    // Authentication Routes
    Auth::routes();


// Authenticated User Routes

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Uploaded Images By User
    Route::get('/profile/images', [ProfileController::class, 'userImages'])->name('profile.images');

    // Profile Settings
    Route::get('/profile/settings', [ProfileController::class, 'editProfile'])->name('edit.profile');
    Route::post('/profile/settings', [ProfileController::class, 'updateProfile'])->name('update.profile');

    // Edit Password
    Route::get('/edit-password', [ProfileController::class, 'editPassword'])->name('edit.password');
    Route::post('/edit-password', [ProfileController::class, 'updatePassword'])->name('update.password');

    // Edit Your Own Images
    Route::get('/profile/images/{image}', [ProfileController::class, 'editYourOwnImage'])->name('edit.own.image');
    Route::post('/profile/images/{image}', [ProfileController::class, 'updateYourOwnImage'])->name('update.own.image');



// Admin Routes

    // Images
    Route::resource('images', ImageController::class);

    // Users
    Route::resource('tags', TagController::class);

    // Users
    Route::resource('users', UserController::class);

    // Add Or Remove User From Admin
    Route::post('/add-to-admins/{user}', [AdminController::class, 'AddToAdmins'])->name('make.admin');
    Route::post('/remove-from-admins/{user}', [AdminController::class, 'removeFromAdmins'])->name('remove.from.admin');

    // Trashed Images
    Route::get('/trashed/images', [ImageController::class, 'viewTrashedImages'])->name('trashed.images');
    Route::PUT('/trashed/images/restore/{image}', [ImageController::class, 'restoreTrashedImage'])->name('restore.trashed.image');
    Route::delete('/trashed/images/delete/{image}', [ImageController::class, 'deleteTrashedImage'])->name('delete.trashed.image');
    


