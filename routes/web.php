<?php

use Illuminate\Support\Facades\{Route,Auth};

Route::get('/', 'PenggunaController@index');
Route::get('/pengguna/grafik', 'PenggunaController@graphPengguna')->name('pengguna.graph');
Route::get('/graph/pengguna', 'GraphController@graphPenggunaJson');
Route::resource('pengguna', 'PenggunaController');
Route::get('/datatables/data', 'PenggunaController@data')->name('datatables.data');
Route::get('/graph/pengguna', 'GraphController@graphPembangunanJson');

Route::group([
    'middleware' => 'auth'
], function() {
    //peta
    Route::get('/our_pembangunan', 'PembangunanMapController@index')->name('pembangunan_map.index');
   
    //grafik
    Route::get('/graph/pembangunan', 'GraphController@graphPembangunanJson');
    Route::get('/pembangunan/graph', 'GraphController@graphPembangunan')->name('pembangunan.graph');
    
    //view pembangunan
    Route::get('/pembangunan/datatable', 'PembangunanController@dataTable');
    Route::get('/pembangunan/export-excel/{tahun}', 'PembangunanController@exportExcel');
    Route::resource('pembangunan', 'PembangunanController');
    Route::get('/pembangunan/delete/{pembangunan}', 'PembangunanController@destroy')->name('pembangunan.delete');
    Route::get('kecamatan/{id}/desa','DropdownController@getDesaByKecamatan');
    Route::resource('desa', 'DesaController');
    Route::get('profile', 'ProfileController@edit')
        ->name('profile.edit');

    Route::patch('profile', 'ProfileController@update')
        ->name('profile.update');

    //view desa


});

Auth::routes();