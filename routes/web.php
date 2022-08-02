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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['midleware' => 'auth', 'checkRole:admin,kasir'], function () {
    Route::resource('/supplier', 'SupplierController');
    Route::resource('/produk', 'ProdukController');
    Route::resource('/kategori', 'KategoriController');


    // transaksi
    Route::get('/transaction', 'TransactionController@viewTransaction')->name('transaction');
    // Route::get('/transaction', 'TransactionController@index')->name('transaction');
    Route::get('/transaction/product/{id}', 'TransactionManageController@transactionProduct');
    Route::get('/transaction/product/check/{id}', 'TransactionManageController@transactionProductCheck');
    Route::post('/transaction/process', 'TransactionManageController@transactionProcess');
    Route::get('/transaction/recipt/{id}', 'TransactionController@receiptTransaction');

    //Kelola User
    Route::get('/user', 'UserManageController@viewAccount')->name('user');
    Route::post('/user/create', 'UserManageController@createAccount')->name('user.create');
    Route::get('/user/delete/{id}', 'UserManageController@deleteAccount')->name('user.delete');
    Route::get('/account/edit/{id}', 'UserManageController@editAccount');
    Route::post('/account/update', 'UserManageController@updateAccount');
    Route::get('/account/filter/{id}', 'UserManageController@filterTable');
});
