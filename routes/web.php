<?php
use App\Http\Controllers\KnigiController;
use App\Http\Controllers\MaiController;
use App\Http\Controllers\OtzyvController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LibrController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BronController;

use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/bron', [BronController::class, "bron"] );
Route::post('/bron-knigu/{id}', [BronController::class, 'bronKnigu']);
Route::get('/bron-zabronirovannye', [BronController::class, 'zabronKnigi'])->name('bron-zabronirovannye');
Route::post('/snyat-bron/{id}', [BronController::class,'snyatBron'])->name('snyat-bron');
Route::post('/spisok', [KnigiController::class, "index"] );
Route::get('/search_results', [KnigiController::class, "search"] );
Route::get('/libr', [LibrController::class, "libr"] );
Route::post('/add-book', [LibrController::class, 'addBook'])->name('add-book');
Route::get('/vydacha', [LibrController::class, "vydacha"] );;
Route::post('/delete-book/{id}', [LibrController::class, 'deleteBook']);
Route::post('/vydat-knigu/{id}', [LibrController::class, 'vydatKnigu']);
Route::post('/vozvrat-knigi/{id}', [LibrController::class, 'vozvratKnigi']);
Route::get('/', [MaiController::class, "login"] );
Route::get('/home', [MaiController::class, "home"] );
Route::get('/spisok', [MaiController::class, "spisok"] );
Route::get('/admin', [LoginController::class, "admin"] );
Route::post('/add-user', [LoginController::class, 'addUser']);
Route::post('/delete-user/{id}', [LoginController::class, 'deleteUser']);
Route::get('/error', [MaiController::class, "error"] );
Route::post('/add-otzyv', [OtzyvController::class, 'addOtzyv'])->name('add-otzyv');
Route::get('/otzyv', [OtzyvController::class, "otzyv"]);




