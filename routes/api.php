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



Route::post('/authentication', 'TokenController@Auth');
Route::post('/mobileauth', 'TokenController@mobileAuth');
Route::get('/online', 'TokenController@validateToken');

Route::get('branches','BranchesController@index');
Route::post('branches','BranchesController@store');
Route::get('/branches/{id}','BranchesController@show');
Route::put('/branches/{id}','BranchesController@update');
Route::delete('/branches/{id}','BranchesController@destroy');

Route::get('detailPemesanan','DetailPemesananController@index');
Route::post('detailPemesanan','DetailPemesananController@store');
Route::get('/detailPemesanan/{id}','DetailPemesananController@show');
Route::put('/detailPemesanan/{id}','DetailPemesananController@update');
Route::delete('/detailPemesanan/{id}','DetailPemesananController@destroy');
Route::delete('/detailPemesanan/{idorder}/{idspa}','DetailPemesananController@hapusDetailOrder');

Route::get('detailPenjualanJasa','DetailPenjualanJasaController@index');
Route::post('detailPenjualanJasa','DetailPenjualanJasaController@store');
Route::get('/detailPenjualanJasa/{id}','DetailPenjualanJasaController@show');
Route::put('/detailPenjualanJasa/{id}','DetailPenjualanJasaController@update');
Route::delete('/detailPenjualanJasa/{id}','DetailPenjualanJasaController@destroy');

Route::get('detailPenjualanSparepart','DetailPenjualanSparepartController@index');
Route::post('detailPenjualanSparepart','DetailPenjualanSparepartController@store');
Route::get('/detailPenjualanSparepart/{id}','DetailPenjualanSparepartController@show');
Route::put('/detailPenjualanSparepart/{id}','DetailPenjualanSparepartController@update');
Route::delete('/detailPenjualanSparepart/{id}','DetailPenjualanSparepartController@destroy');

Route::get('services','JasaServiceController@index');
Route::post('services','JasaServiceController@store');
Route::get('/services/{id}','JasaServiceController@show');
Route::put('/services/{id}','JasaServiceController@update');
Route::delete('/services/{id}','JasaServiceController@destroy');

Route::get('kendaraanPelanggan','KendaraanPelangganController@index');
Route::post('kendaraanPelanggan','KendaraanPelangganController@store');
Route::get('/kendaraanPelanggan/{id}','KendaraanPelangganController@show');
Route::put('/kendaraanPelanggan/{id}','KendaraanPelangganController@update');
Route::delete('/kendaraanPelanggan/{id}','KendaraanPelangganController@destroy');

Route::get('montirOnDuty','MontirOnDutyController@index');
Route::post('montirOnDuty','MontirOnDutyController@store');
Route::get('/montirOnDuty/{id}','MontirOnDutyController@show');
Route::put('/montirOnDuty/{id}','MontirOnDutyController@update');
Route::delete('/montirOnDuty/{id}','MontirOnDutyController@destroy');

Route::get('motors','MotorController@index');
Route::post('motors','MotorController@store');
Route::get('/motors/{id}','MotorController@show');
Route::put('/motors/{id}','MotorController@update');
Route::delete('/motors/{id}','MotorController@destroy');

Route::get('pegawai','PegawaiController@index');
Route::post('pegawai','PegawaiController@store');
Route::get('/pegawai/{id}','PegawaiController@show');
Route::put('/pegawai/{id}','PegawaiController@update');
Route::delete('/pegawai/{id}','PegawaiController@destroy');
Route::post('/pegawai/login','PegawaiController@login');

Route::get('pegawaiOnDuty','PegawaiOnDutyController@index');
Route::post('pegawaiOnDuty','PegawaiOnDutyController@store');
Route::get('/pegawaiOnDuty/{id}','PegawaiOnDutyController@show');
Route::put('/pegawaiOnDuty/{id}','PegawaiOnDutyController@update');
Route::delete('/pegawaiOnDuty/{id}','PegawaiOnDutyController@destroy');

Route::get('pelanggan','PelangganController@index');
Route::post('pelanggan','PelangganController@store');
Route::get('/pelanggan/{id}','PelangganController@show');
Route::put('/pelanggan/{id}','PelangganController@update');
Route::delete('/pelanggan/{id}','PelangganController@destroy');

Route::get('pemesanan','PemesananSparepartController@index');
Route::post('pemesanan','PemesananSparepartController@store');
Route::get('/pemesanan/{id}','PemesananSparepartController@show');
Route::put('/pemesanan/{id}','PemesananSparepartController@update');
Route::delete('/pemesanan/{id}','PemesananSparepartController@destroy');

Route::get('posisi','PosisiController@index');
Route::post('posisi','PosisiController@store');
Route::get('/posisi/{id}','PosisiController@show');
Route::put('/posisi/{id}','PosisiController@update');
Route::delete('/posisi/{id}','PosisiController@destroy');

Route::get('spareparts','SparepartController@index');
Route::post('spareparts','SparepartController@store');
Route::get('/spareparts/{id}','SparepartController@show');
Route::put('/spareparts/{id}','SparepartController@update');
Route::delete('/spareparts/{id}','SparepartController@destroy');
Route::post('updateGambar/{id}','SparepartController@updateGambar');
Route::post('updateImageMobile','SparepartController@updateImageMobile');
Route::get('sortJumlahAsc','SparepartController@indexAscJumlah');
Route::get('sortJumlahDesc','SparepartController@indexDescJumlah');
Route::get('sortHargaAsc','SparepartController@indexAscHarga');
Route::get('sortHargaDesc','SparepartController@indexDescHarga');

Route::get('sparepartMotor','SparepartMotorController@index');
Route::post('sparepartMotor','SparepartMotorController@store');
Route::get('/sparepartMotor/{id}','SparepartMotorController@show');
Route::put('/sparepartMotor/{id}','SparepartMotorController@update');
Route::delete('/sparepartMotor/{id}','SparepartMotorController@destroy');
Route::delete('/sparepartMotor/{id}/{idM}','SparepartMotorController@hapus');
Route::get('/showMatch/{idSparepart}','SparepartMotorController@showMatch');

Route::get('suppliers','SupplierController@index');
Route::post('suppliers','SupplierController@store');
Route::get('/suppliers/{id}','SupplierController@show');
Route::put('/suppliers/{id}','SupplierController@update');
Route::delete('/suppliers/{id}','SupplierController@destroy');

Route::get('transaksiPenjualan','TransaksiPenjualanController@index');
Route::post('transaksiPenjualan','TransaksiPenjualanController@store');
Route::get('/transaksiPenjualan/{id}','TransaksiPenjualanController@show');
Route::put('/transaksiPenjualan/{id}','TransaksiPenjualanController@update');
Route::delete('/transaksiPenjualan/{id}','TransaksiPenjualanController@destroy');

Route::get('users','UserController@index');
Route::post('users','UserController@store');
Route::get('/users/{id}','UserController@show');
Route::put('/users/{id}','UserController@update');
Route::delete('/users/{id}','UserController@destroy');

Route::get('tokens','TokenController@index');
Route::post('tokens','TokenController@store');
Route::get('/tokens/{id}','TokenController@show');
Route::put('/tokens/{id}','TokenController@update');
Route::delete('/tokens/{id}','TokenController@destroy');






//  Route::resource('branches','BranchesController');
//  Route::resource('jasa_service','JasaServiceController');
//  Route::resource('motor','MotorController');
//  Route::resource('pegawai','PegawaiController');
//  Route::resource('pelanggan','PelangganController');
//  Route::resource('posisi','PosisiController');
//  Route::resource('sparepart','SparepartController');
//  Route::resource('supplier','SupplierController');
//  Route::resource('detail_pemesanan','DetailPemesananController');
//  Route::resource('detail_penjualan_jasa','DetailPenjualanJasaController');
//  Route::resource('detail_penjualan_sparepart','DetailPenjualanSparepartController');
//  Route::resource('pemesanan_sparepart','PemesananSparepartController');
//  Route::resource('transaksi_penjualan','TransaksiPenjualanController');
//  Route::resource('kendaraan_pelanggan','KendaraanPelangganController');
//  Route::resource('montir_onduty','MontirOnDutyController');
//  Route::resource('pegawai_onduty','PegawaiOnDutyController');
//  Route::resource('sparepart_motor','SparepartMotorController');
