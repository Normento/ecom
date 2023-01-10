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
        //Update admin password
        Route::match(['get','post'], 'update-admin-password','AdminController@updateAdminPassword')->name('update-admin-password');
        //Check admin password
        Route::post('check-current-password', 'AdminController@checkCurrentPassword');
        //Update admin details
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails')->name('update-admin-details');
        //Update Vendors business details
        Route::match(['get', 'post'], 'update-vendor-details/business', 'AdminController@updateVendorsBusinessDetails')->name('update-vendors-business-details');
        //Update vendor personal details
        Route::match(['get', 'post'], 'update-vendor-details/personal', 'AdminController@updateVendorsPersonalDetails')->name('update-vendors-personal-details');
        //Update vendor bank details
        Route::match(['get', 'post'], 'update-vendor-details/bank', 'AdminController@updateVendorsBankDetails')->name('update-vendors-bank-details');
        //View Admins Subadmins Vendors

        Route::get('admins/{type}', 'AdminController@admins')->name('manage.admins');
        Route::get('admins', 'AdminController@allAdmins')->name('manage.admins.all');
        //View vendor details
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails')->name('view-vendor-details');
        //Update admin status

        Route::post('update-admin-status', 'AdminController@updateAdminStatus');

        //Admin logout route

        Route::get('logout','AdminController@logout')->name('admin.logout');
    });

});


