<?php

use Illuminate\Support\Facades\Route;

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
    Route::group([ 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
        Route::get('/','App\Http\Controllers\Dashboard\DashboardController@index')->name('admin.dashboard');
        Route::get('/category/create','App\Http\Controllers\Dashboard\CategoryController@create')->name('category.create');
        Route::post('/category/store','App\Http\Controllers\Dashboard\CategoryController@store')->name('categories.store');

        Route::resource('companies','App\Http\Controllers\Dashboard\CompanyController');
        Route::post('/area','App\Http\Controllers\Dashboard\CompanyController@area')->name('get.area');
        Route::delete('/destroy/{id}','App\Http\Controllers\Dashboard\CompanyController@image_destroy')->name('image.destroy');

        
    });

    Route::group(['prefix' => 'admin/login'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\LoginController@login')
        ->name('login');
        Route::get('logout', 'App\Http\Controllers\Dashboard\LoginController@logout')->name('admin.logout');
        Route::post('/', 'App\Http\Controllers\Dashboard\LoginController@postLogin')
        ->name('admin.post.login');
    });