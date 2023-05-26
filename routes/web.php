<?php

use App\Http\Controllers\downloadController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('download/{id}', [downloadController::class, 'download'])->name('download');
Route::get('downloadmemo/{id}', [downloadController::class, 'downloadmemo'])->name('downloadmemo');
Route::get('downloadmemotoecs/{id}', [downloadController::class, 'downloadmemotoecs'])->name('downloadmemotoecs');
Route::get('downloadadv/{id}', [downloadController::class, 'downloadadv'])->name('downloadadv');
