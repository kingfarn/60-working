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

Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('products', 'ProductController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('customer', 'CustomerController');
    Route::resource('invoice', 'InvoiceController');
    Route::get('/{id}/print', 'InvoiceController@generateInvoice')->name('invoice.print');
    Route::delete('/{id}/delete', 'InvoiceController@deleteProduct')->name('invoice.delete_product');
});
