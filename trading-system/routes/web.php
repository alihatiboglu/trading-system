<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AccountController;

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
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Auth::routes();

    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('about', [PageController::class, 'about'])->name('about');
    Route::get('contact', [PageController::class, 'contact'])->name('contact');
    Route::post('contact', [PageController::class, 'send'])->name('send');
    Route::get('economic', [PageController::class, 'economic'])->name('economic');
    Route::get('management', [PageController::class, 'management'])->name('management');
    Route::get('products/{id}', [PageController::class, 'product'])->name('product');
    Route::get('programs/{id}', [PageController::class, 'program'])->name('program');
    Route::get('news', [PageController::class, 'blog'])->name('blog.index');
    Route::get('news/{id}', [PageController::class, 'singleBlog'])->name('blog.single');
    Route::get('seminars', [PageController::class, 'seminars'])->name('seminars');
    Route::post('seminars', [PageController::class, 'order'])->name('courses.order');
    Route::get('courses', [PageController::class, 'courses'])->name('courses');
    Route::get('courses/{id}', [PageController::class, 'singleCourse'])->name('courses.single');
    Route::get('education', [PageController::class, 'education'])->name('education');
    Route::get('education/{id}', [PageController::class, 'singleEducation'])->name('education.single');

    Route::get('accountType', [AccountController::class, 'index'])->name('accounts.type');
    
    Route::group(['middleware' => 'auth'], function () {
        Route::get('demoAccount', [AccountController::class, 'demoAccount'])->name('accounts.demo');
        Route::post('demoAccount', [AccountController::class, 'demoSave'])->name('accounts.demo.save');
        Route::get('partnerAccount', [AccountController::class, 'partnerAccount'])->name('accounts.partner');
        Route::post('partnerAccount', [AccountController::class, 'partnerSave'])->name('accounts.partner.save');
        Route::get('realAccount', [AccountController::class, 'realAccount'])->name('accounts.real');
        Route::post('realAccount', [AccountController::class, 'realSave'])->name('accounts.real.save');
        Route::get('packageAccount/{id}', [AccountController::class, 'packageAccount'])->name('accounts.package');
        Route::post('packageAccount/{id}', [AccountController::class, 'packageAccountSave'])->name('accounts.package.save');
    });
});

Route::get('/setLocale/{locale}', function ($locale) {
    if (! in_array($locale, \App\Models\Language::pluck('code')->toArray())) {
        abort(400);
    }
    Session::put('app_locale', $locale);
    return back();
})->name('set_locale');
