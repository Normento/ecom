<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Routing\RouteGroup;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    // Admin login route

    Route::match(['get','post'],'login', 'AdminController@login')->name('admin.login');

    Route::group(['middleware'=>['admin']],function(){

        // Admin dashboard route

        Route::get('dashboard','AdminController@dashboard')->name('admin.dashboard');

        //Admin logout route

        Route::get('logout','AdminController@logout')->name('admin.logout');
    });

});


