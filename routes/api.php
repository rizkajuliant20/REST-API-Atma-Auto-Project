<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('cabang','BranchesController');
Route::resource('jasa_service','JasaServiceController');
Route::resource('motor','MotorController');
Route::resource('pegawai','PegawaiController');
Route::resource('pelanggan','PelangganController');
Route::resource('posisi','PosisiController');
Route::resource('sparepart','SparepartController');
Route::resource('supplier','SupplierController');
