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

/* Веб-маршрутизация запросов */

/* Маршрут перехода на главную страницу блога */
Route::get('/', [BlogController::class, 'index'])->name('index');

/* Маршрут перехода к странице для отобраения всех постов выбранной пользоателем категории */
Route::get('/category/{slug}', [BlogController::class, 'getPostByCategory'])->name('getPostByCategory');

/* Маршрут перехода на страницу выбранного пользователем поста */
Route::get('/category/{slug_category}/{slug_post}', [BlogController::class, 'getPost'])->name('getPost');

/* Маршрут передачи данных введенного нового комментария пользоателем на сервер */
Route::post('/category/{slug_category}/{slug_post}', [BlogController::class, 'postNewComment'])->name('postNewComment');