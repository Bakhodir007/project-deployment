<?php

use App\Http\Controllers\AppLayoutController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('app')->as('app.')->group(static function () {
    Route::get('layout/{skin}', AppLayoutController::class)->name('layout.skin');
});

Route::redirect('/', 'login');
Route::redirect('/home', '/admin/product');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
