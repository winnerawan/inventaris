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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/category', 'CategoryController');
Route::resource('/program', 'ProgramController');
Route::resource('/users', 'UserController')->middleware('admin');
Route::resource('/stuff', 'StuffController');
Route::resource('/item', 'ItemController');
Route::resource('/repair', 'RepairController');
Route::get('repairback', 'RepairController@back')->name('repair.back');
Route::post('repairfixed', 'RepairController@fixed')->name('repair.fixed');
Route::get('getJsonQty/{id}', 'RepairController@getJsonQty');
Route::get('/user/change', 'UserController@showFormChangePassword');
Route::put('/user/updatePassword', 'UserController@updatePassword')->name('user.change');
Route::get('/reportStuffs', 'ReportController@generateReportStuffs');
Route::get('/reportItems', 'ReportController@generateReportItems');
Route::get('/reportRepairs', 'ReportController@generateReportRepairs');


