<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//Clear route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

// Clear application cache:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

//Route::get('/frontend.index', 'WelcomeController@index');
Route::get('/', 'WelcomeController@index');
Route::get('/projects', 'FrontEnd\ProjectPageController@show');
Route::get('/projects/{post}', 'FrontEnd\ProjectPageController@singleproject');
Route::get('/products', 'FrontEnd\ProductPageController@show');
Route::get('/products/cat-{post}', 'FrontEnd\ProductPageController@categoryproduct');
Route::get('/products/{post}', 'FrontEnd\ProductPageController@singleproduct');
Route::get('/services', 'FrontEnd\ServicePageController@show');
Route::get('/services/{post}', 'FrontEnd\ServicePageController@singleservice');
Route::get('/inspirations', 'FrontEnd\BlogPageController@show');
Route::get('/inspirations/cat-{post}', 'FrontEnd\BlogPageController@categoryblog');
Route::get('/inspirations/{post}', 'FrontEnd\BlogPageController@singleblog');
Route::get('/aboutus', 'Admin\AboutusController@showaboutus');
Route::get('/contact', 'Admin\ContactController@showcontact');
Route::post('/contact', [
    'uses' => 'Admin\ContactListController@ContactUsForm',
    'as' => 'contact.store'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/role-register', 'Admin\DashboardController@registered');
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id}', 'Admin\DashboardController@registerupdate');
    Route::delete('/role-delete/{id}', 'Admin\DashboardController@registerdelete');

    Route::get('/abouts', 'Admin\AboutusController@index');
    Route::post('/save-aboutus', 'Admin\AboutusController@store');
    Route::get('/aboutus-edit/{id}', 'Admin\AboutusController@edit');
    Route::put('/aboutus-update/{id}', 'Admin\AboutusController@update');
    Route::delete('/aboutus-delete/{id}', 'Admin\AboutusController@delete');

    Route::get('/service-category', 'Admin\ServiceController@index');
    Route::get('/service-category-create', 'Admin\ServiceController@create');
    Route::post('/service-category-store', 'Admin\ServiceController@store');
    Route::get('/service-category-edit/{id}', 'Admin\ServiceController@edit');
    Route::put('/service-category-update/{id}', 'Admin\ServiceController@update');
    Route::delete('/service-cate-delete/{id}', 'Admin\ServiceController@delete');

    Route::get('/service-list', 'Admin\ServicelistController@index');
    Route::get('/service-create', 'Admin\ServicelistController@create');
    Route::post('/service-store', 'Admin\ServicelistController@store');
    Route::get('/service-edit/{id}', 'Admin\ServicelistController@edit');
    Route::put('/service-update/{id}', 'Admin\ServicelistController@update');
    Route::delete('/service-delete/{id}', 'Admin\ServicelistController@delete');

    Route::get('/project-category', 'Admin\ProjectController@index');
    Route::get('/project-category-create', 'Admin\ProjectController@create');
    Route::post('/project-category-store', 'Admin\ProjectController@store');
    Route::get('/project-category-edit/{id}', 'Admin\ProjectController@edit');
    Route::put('/project-category-update/{id}', 'Admin\ProjectController@update');
    Route::delete('/project-cate-delete/{id}', 'Admin\ProjectController@delete');

    Route::get('/project-list', 'Admin\ProjectlistController@index');
    Route::get('/project-create', 'Admin\ProjectlistController@create');
    Route::post('/project-store', 'Admin\ProjectlistController@store');
    Route::get('/project-edit/{id}', 'Admin\ProjectlistController@edit');
    Route::put('/project-update/{id}', 'Admin\ProjectlistController@update');
    Route::delete('/project-proj-delete/{id}', 'Admin\ProjectlistController@delete');
    Route::post('/project-images-store/{id}', 'Admin\ProjectlistController@imagestore')->middleware('ajax');

    Route::get('/product-category', 'Admin\ProductController@index');
    Route::get('/product-category-create', 'Admin\ProductController@create');
    Route::post('/product-category-store', 'Admin\ProductController@store');
    Route::get('/product-category-edit/{id}', 'Admin\ProductController@edit');
    Route::put('/product-category-update/{id}', 'Admin\ProductController@update');
    Route::delete('/product-cate-delete/{id}', 'Admin\ProductController@delete');

    Route::get('/product-list', 'Admin\ProductlistController@index');
    Route::get('/product-create', 'Admin\ProductlistController@create');
    Route::post('/product-store', 'Admin\ProductlistController@store');
    Route::get('/product-edit/{id}', 'Admin\ProductlistController@edit');
    Route::put('/product-update/{id}', 'Admin\ProductlistController@update');
    Route::delete('/product-prod-delete/{id}', 'Admin\ProductlistController@delete');
    Route::post('/product-images-store/{id}', 'Admin\ProductlistController@imagestore')->middleware('ajax');

    Route::get('/process-list', 'Admin\ProcesslistController@index');
    Route::get('/process-create', 'Admin\ProcesslistController@create');
    Route::post('/process-store', 'Admin\ProcesslistController@store');
    Route::get('/process-edit/{id}', 'Admin\ProcesslistController@edit');
    Route::put('/process-update/{id}', 'Admin\ProcesslistController@update');
    Route::delete('/process-proj-delete/{id}', 'Admin\ProcesslistController@delete');

    Route::get('/blog-category', 'Admin\BlogCategoryController@index');
    Route::get('/blog-category-create', 'Admin\BlogCategoryController@create');
    Route::post('/blog-category-store', 'Admin\BlogCategoryController@store');
    Route::get('/blog-category-edit/{id}', 'Admin\BlogCategoryController@edit');
    Route::put('/blog-category-update/{id}', 'Admin\BlogCategoryController@update');
    Route::delete('/blog-cate-delete/{id}', 'Admin\BlogCategoryController@delete');

    Route::get('/blog-list', 'Admin\BlogListController@index');
    Route::get('/blog-create', 'Admin\BlogListController@create');
    Route::post('/blog-store', 'Admin\BlogListController@store');
    Route::get('/blog-edit/{id}', 'Admin\BlogListController@edit');
    Route::put('/blog-update/{id}', 'Admin\BlogListController@update');
    Route::delete('/blog-delete/{id}', 'Admin\BlogListController@delete');

    Route::get('/slider', 'Admin\SliderController@index');
    Route::post('/save-slider', 'Admin\SliderController@store');
    Route::get('/slider-edit/{id}', 'Admin\SliderController@edit');
    Route::put('/slider-update/{id}', 'Admin\SliderController@update');
    Route::delete('/slider-delete/{id}', 'Admin\SliderController@delete');

    Route::get('/banner-list', 'Admin\BannerController@index');
    Route::get('/banner-create', 'Admin\BannerController@create');
    Route::post('/save-banner', 'Admin\BannerController@store');
    Route::get('/banner-edit/{id}', 'Admin\BannerController@edit');
    Route::put('/banner-update/{id}', 'Admin\BannerController@update');
    Route::delete('/banner-delete/{id}', 'Admin\BannerController@delete');

    Route::get('/teammember-list', 'Admin\TeamController@index');
    Route::get('/teammember-create', 'Admin\TeamController@create');
    Route::post('/teammember-store', 'Admin\TeamController@store');
    Route::get('/teammember-edit/{id}', 'Admin\TeamController@edit');
    Route::put('/teammember-update/{id}', 'Admin\TeamController@update');
    Route::delete('/teammember-delete/{id}', 'Admin\TeamController@delete');

    Route::get('/settings', 'Admin\SettingsController@index');
    Route::put('/settings-update', 'Admin\SettingsController@update');

    Route::get('/homesettings', 'Admin\HomeSettingsController@index');
    Route::put('/homesettings-update', 'Admin\HomeSettingsController@update');

    Route::get('/contactsettings', 'Admin\ContactController@index');
    Route::put('/contactsettings-update', 'Admin\ContactController@update');

    Route::get('/contactlist', 'Admin\ContactListController@index');
});
