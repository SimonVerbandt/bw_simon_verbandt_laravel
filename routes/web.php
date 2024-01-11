<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\UserIsAdmin;
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

Route::get('/', function () {
    return view('welcome', [
        'articles' => App\Models\Article::all(),
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(UserIsAdmin::class)->group(function () {
    Route::post('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::delete('/faq/delete', [FaqController::class, 'destroy'])->name('faq.destroy');
    Route::post('/faq/category/create', [FaqController::class, 'createCategory'])->name('faq.category.create');
    Route::post('/faq/category/edit', [FaqController::class, 'editCategory'])->name('faq.category.edit');
    Route::delete('/faq/category/delete', [FaqController::class, 'destroyCategory'])->name('faq.category.destroy');
});

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/faq/category', [FaqController::class, 'indexCategory'])->name('faq.category.index');


require __DIR__.'/auth.php';
