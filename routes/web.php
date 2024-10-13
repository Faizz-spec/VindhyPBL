<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AdminController::class, 'login'])->name('homepage');


Route::get('/service', [CustomerController::class, 'index'])->name('service');
Route::get('/service/project', [CustomerController::class, 'search'])->name('service.search');
Route::get('/service/project/{project:code_project}', [CustomerController::class, 'show'])->name('service.show');


Route::prefix('admin')->middleware('auth')->group(function()  {
    Route::resource('/dashboard', AdminController::class);
    Route::resource('/project', ProjectController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/sparepart', SparepartController::class);
    Route::resource('/users', UserController::class)->middleware('can:isSuper');
});

Route::get('pendapatan', [AdminController::class, 'pendapatan'])->name('pendapatan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
