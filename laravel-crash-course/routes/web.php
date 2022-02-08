<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;

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

Route::get('/', [BlogController::class, 'index'])->name('index');

Route::get('/category/{slug}', [BlogController::class, 'getPostByCategory'])->name('getPostByCategory');

Route::get('/category/{slug_category}/{slug_post}', [BlogController::class, 'getPost'])->name('getPost');

Route::post('/category/{slug_category}/{slug_post}', [BlogController::class, 'postNewComment'])->name('postNewComment');