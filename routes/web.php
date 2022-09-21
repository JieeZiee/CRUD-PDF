<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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

//CRUD
Route::resource('products', ProductController::class);

//PDF
Route::get('/createPDF', [ProductController::class,'createPDF'])->name('pdf.create');

//Login Page
Route::get('home_user', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class,'register']);
Route::get('/logout', 'User@logout');

Route::controller(AuthController::class)->group(function () {
    Route::post('/registerPost', 'registerPost');
    Route::post('/loginPost', 'loginPost');
});
