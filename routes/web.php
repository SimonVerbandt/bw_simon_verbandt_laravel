<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactFormResponseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsItemController;
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
    Route::controller(FaqController::class)->group(function () {
        Route::get('/admin/faq', 'showAdminFaq')->name('admin.faq.index');
        Route::post('/admin/faq/new', 'create')->name('faq.create');
        Route::post('/admin/faq/{slug}/edit', 'edit')->name('faq.edit');
        Route::delete('/admin/faq/{slug}',  'destroy')->name('faq.destroy');
        Route::get('/admin/faq/category', 'showAdminCategory')->name('admin.faq.category');
        Route::post('/admin/faq/category/new', 'createCategory')->name('faq.category.create');
        Route::post('/admin/faq/category/{slug}/edit', 'editCategory')->name('faq.category.edit');
        Route::delete('/admin/faq/category/{slug}', 'destroyCategory')->name('faq.category.destroy');
    });
    Route::controller(NewsItemController::class)->group(function () {
        Route::get('/admin/news', 'showAdminNews')->name('admin.news');
        Route::post('/admin/news/new',  'create')->name('news.create');
        Route::post('/admin/news/{slug}', 'edit')->name('news.edit');
        Route::delete('/admin/news/{slug}',  'destroy')->name('news.destroy');
    });
    Route::controller(ContactFormResponseController::class)->group(function(){
        Route::get('/contact-forms', 'showAdminContactForms')->name('admin.contact-forms');
        Route::post('/contact-form-response/{contact-form-id}', 'create')->name('contact-form-response.create');
        Route::post('/contact-form-response/{contact-form-id}/{slug}', 'edit')->name('contact-form-response.edit');
        Route::delete('/contact-form-response/{contact-form-id}/{slug}', 'destroy')->name('contact-form-response.destroy');
    });
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
});

Route::controller(FaqController::class)->group(function () {
    Route::get('/faq', 'index')->name('faq.index');
    Route::get('/faq/{slug}', 'showCategory')->name('faq.category.show');
});

Route::controller(NewsItemController::class)->group(function () {
    Route::get('/news', 'index')->name('news.index');
});

Route::controller(ContactFormController::class)->group(function(){
    Route::get('/contact-form', 'show')->name('contact-form.show');
    Route::post('/contact-form', 'submit')->name('contact-form.submit');
});

Route::controller(AirlineController::class)->group(function(){
    Route::get('/airline', 'index')->name('airline.index');
    Route::get('/airline/{slug}', 'show')->name('airline.show');
});

Route::get('/about', function(){
    return view('about');
})->name('about');

//TODO: Admin routes finishing up, make corresponding views


require __DIR__ . '/auth.php';
