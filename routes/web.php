<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile;

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

//Route::get('/register', [Register::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', [Profile::class, 'dashboard'])
    ->name('dashboard');

Route::resource('category', Category::class);

Route::resource('image', Image::class);
