<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactFormResponseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
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
    Route::get('/admin', function () {
        return view('admin.home');
    })->name('admin');

    Route::controller(AdminController::class)->group(function () {
        //TODO:Make views and make these routes work
        Route::get('/admin/users', 'showAdminUsers')->name('admin.users');
        Route::get('/admin/users/new', 'create')->name('users.create');
        Route::post('/admin/users/store', 'store')->name('users.store');
        Route::get('/admin/users/{name}', 'edit')->name('users.edit');
        Route::patch('/admin/users/{name}', 'update')->name('users.update');
        Route::delete('/admin/users/{name}', 'destroy')->name('users.destroy');
    });

    Route::controller(FaqController::class)->group(function () {
        Route::get('/admin/faq', 'showAdminFaq')->name('admin.faq');
        Route::get('/admin/faq/new', 'create')->name('faq.create');
        Route::post('/admin/faq/new', 'store')->name('faq.store');//TODO: fix form submission error
        Route::get('/admin/faq/{slug}', 'edit')->name('faq.edit');//TODO: create view
        Route::patch('/admin/faq/{slug}', 'update')->name('faq.update');
        Route::delete('/admin/faq/{slug}',  'destroy')->name('faq.destroy');//TODO: update view to handle deletion
        Route::get('/admin/faq/category', 'showAdminCategory')->name('admin.faq.category');
        Route::get('/admin/faq/category/new', 'createCategory')->name('faq.category.create');
        Route::post('/admin/faq/category/store', 'storeCategory')->name('faq.category.store');
        Route::get('/admin/faq/category/{slug}', 'editCategory')->name('faq.category.edit');
        Route::patch('/admin/faq/category/{slug}', 'updateCategory')->name('faq.category.update');
        Route::delete('/admin/faq/category/{slug}', 'destroyCategory')->name('faq.category.destroy');
    });

    Route::controller(NewsItemController::class)->group(function () {
        //TODO: Make views and make these routes work
        Route::get('/admin/news', 'showAdminNews')->name('admin.news');
        Route::get('/admin/news/new',  'create')->name('news.create');
        Route::post('/admin/news/new', 'store')->name('news.store');
        Route::get('/admin/news/{slug}', 'edit')->name('news.edit');
        Route::patch('/admin/news/{slug}', 'update')->name('news.update');
        Route::delete('/admin/news/{slug}', 'destroy')->name('news.destroy');
    });

    Route::controller(ContactFormResponseController::class)->group(function(){
        //
        Route::get('/contact-forms', 'showAdminContactForms')->name('admin.contact-forms');
        Route::get('/contact-form-response/new', 'create')->name('contact-form-response.create');
        Route::post('/contact-form-response/store', 'store')->name('contact-form-response.store');
        Route::get('/contact-form-response/{contact-form-id}', 'edit')->name('contact-form-response.edit');
        Route::patch('/contact-form-response/{contact-form-id}', 'update')->name('contact-form-response.update');
        Route::delete('/contact-form-response/{contact-form-id}', 'destroy')->name('contact-form-response.destroy');
    });
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

Route::controller(ArticleController::class)->group(function(){
    Route::get('/article', 'index')->name('article.index');
    Route::get('/article/{slug}', 'show')->name('article.show');
});

Route::get('/about', function(){
    return view('about');
})->name('about');

require __DIR__ . '/auth.php';
