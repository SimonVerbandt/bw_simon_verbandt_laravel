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
    Route::controller(FaqController::class)->group(function(){
        Route::post('/faq',  'create')->name('faq.create');
        Route::patch('/faq', 'edit')->name('faq.edit');
        Route::delete('/faq',  'destroy')->name('faq.destroy');
        Route::post('/faq/category', 'createCategory')->name('faq.category.create');
        Route::patch('/faq/category', 'editCategory')->name('faq.category.edit');
        Route::delete('/faq/category', 'destroyCategory')->name('faq.category.destroy');
    });
});

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/faq/{slug}', [FaqController::class, 'showCategory' ])->name('faq.category.show');
//TODO: Fix the route and controller method for showing a single FAQ category


require __DIR__.'/auth.php';
