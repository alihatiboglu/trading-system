<?php

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
Route::get('dashboard/login'    , 'AuthController@login')->name('dashboard.login');
Route::post('dashboard/login'    , 'AuthController@postLogin')->name('dashboard.postLogin');
Route::post('dashboard/logout'    , 'AuthController@logout')->name('dashboard.logout');

Route::group(['middleware' => ['admin','language']], function () {
    Route::prefix('dashboard')->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard.index');
        Route::resource('items', 'ItemController');
        Route::get('clients/{id}','UserController@clients')->name('user.clients');

        Route::get('users/export' , 'UserController@export')->name('users.export');
        Route::resource('users'    , 'UserController');
        Route::resource('categories' , 'CategoryController');
        Route::get('accounts/confirm/{id}','AccountController@confirm')->name('accounts.confirm');
        Route::resource('accounts' , 'AccountController');

//        Route::post('posts','PostController@destroy')->name('posts.destroy');
        Route::resource('education'    ,'EducationController');
        Route::resource('posts'    , 'PostController');
        Route::resource('slider'    , 'SliderController');
        Route::resource('services'    , 'ServiceController');
        Route::resource('roles'    , 'RoleController');
        Route::get('documents/confirm/{id}','DocumentController@confirm')->name('documents.confirm');
        Route::resource('documents'    , 'DocumentController');
        Route::resource('ads'    , 'AdController');
        Route::resource('team'    , 'TeamController');
        Route::resource('programs'    , 'ProgramController');
        Route::resource('countries'    , 'CountryController');
        Route::resource('packages'    , 'PackageController');
        Route::get('translations/fetch','LanguageController@fetch')->name('translations.fetch');
        Route::get('translations','LanguageController@translations')->name('translations');
        Route::post('translations','LanguageController@storeTranslations')->name('translations.store');
        Route::resource('languages'    , 'LanguageController');
        Route::resource('tradingTable'    , 'TradingTableController');
        Route::resource('typeAccounts'    , 'TypeAccountController');
        Route::get('orders/export' , 'OrderController@export')->name('orders.export');
        Route::resource('orders'    , 'OrderController');
        Route::resource('courses'    , 'CourseController');
        Route::resource('pages'    , 'PageController');
        Route::resource('features'    , 'FeatureController');

        Route::get('file/upload','FileController@fileCreate');
        Route::post('file/upload/store','FileController@upload')->name('files.store');
        Route::post('file/delete','FileController@destroy')->name('files.destroy');
    });
});
