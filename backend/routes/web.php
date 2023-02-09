<?php

use App\Http\Controllers\ContatosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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


// contatos
Route::get('/', [ContatosController::class, 'api']);
Route::post('/insert', [ContatosController::class, 'insert']);
Route::get('/insert', [ContatosController::class, 'insert']);
Route::delete('/delete/{id?}', [ContatosController::class, 'delete']);
Route::put('/update/{id?}', [ContatosController::class, 'update']);
// contatos

// login
Route::post('/api/log', [LoginController::class, 'log']);
Route::get('api/log', [LoginController::class, 'log']);
Route::post('/userlogin', [LoginController::class, 'insert']);
Route::get('/userlogin', [LoginController::class, 'insert']);
// login

// PDF
Route::get("/pdf", [PdfController::class, 'pdf']);
// PDF

//upload
Route::get("/upload", [UploadController::class, 'upload']);
Route::post("/upload", [UploadController::class, 'upload']);
//upload