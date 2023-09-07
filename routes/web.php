<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;


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

Route::get('/', [InterviewController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/data/response', [InterviewController::class, 'data'])->name('data.response');
Route::get('/data/export-excel', [InterviewController::class, 'export'])->name('export-excel');
Route::get('/data/export-pdf', [InterviewController::class, 'exportPDF'])->name('export-pdf');
Route::get('/data/type', [InterviewController::class, 'dataType'])->name('data.type');
Route::post('/home', [InterviewController::class, 'store'])->name('dashboard');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/dashboard/response/{id}', [ResponseController::class, 'index'])->name('dashboard.response.index');
    Route::post('/dashboard/response/{id}', [ResponseController::class, 'store'])->name('dashboard.response.store');
    Route::get('/dashboard/response/{id}/edit', [ResponseController::class, 'edit'])->name('dashboard.response.edit');
    Route::put('/dashboard/response/{id}/update', [ResponseController::class, 'update'])->name('dashboard.response.update');
    Route::delete('/dashboard/response/{id}', [ResponseController::class, 'destroy'])->name('dashboard.response.destroy');
});

Route::middleware(['auth','checkRole:admin'])->group(function () {
    Route::get('/data/export-excel', [InterviewController::class, 'export'])->name('export-excel');
    Route::get('/data/export-pdf', [InterviewController::class, 'exportPDF'])->name('export-pdf');
    Route::get('/data', [InterviewController::class, 'dataAdmin'])->name('data.admin');
    Route::get('/data/response', [InterviewController::class, 'data'])->name('data.response');
    Route::get('/data/type', [InterviewController::class, 'dataType'])->name('data.type');

});

Route::middleware(['auth','checkRole:petugas'])->group(function () {
    Route::get('/data/response', [InterviewController::class, 'data'])->name('data.response');
    Route::get('/data/type', [InterviewController::class, 'dataType'])->name('data.type');

});



