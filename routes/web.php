<?php
use Illuminate\Support\Facades\Route;
use App\http\Controllers\KelolaBrgController;
use App\Models\PermintaanPembelian;
use App\http\Controllers\PermintaanPembelianController;
use App\Models\KelolaBrg;
use App\Models\Masterpembeli;
use App\http\Controllers\MasterpembeliController;
use App\http\Controllers\LaporanBKController;
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

Route::get('/', function () {return view('auth.login', []);});
Route::resource('/Masterbrg', 'MasterBarangController');
route::resource('/PP','PermintaanPembelianController');
route::resource('/brgmsk','BarangmasukController');
Route::resource('/brgklr', 'TransaksiBarangKeluarController');

Route::resource('/lap','LaporanController');
Route::resource('/lapBK','LaporanBKController');
Route::resource('/lapKEU','LaporanKEUController');

Route::resource('/mastersupplier', 'MasterSupplierController');

Route::resource('/masterpembeli', 'MasterpembeliController');
Route::resource('/invoice', 'InvoiceController');
Route::get('changeStatus/{invoice}', 'InvoiceController@changeStatus')->name('changeStatus');
Route::get('suratjalanpdf', 'TransaksiBarangKeluarController@generatePDFs');

Route::get('laporanbm', 'LaporanController@generatePDFbm');
Route::get('laporanbk', 'LaporanBKController@generatePDFbk');
Route::get('laporank', 'LaporanKEUController@generatePDFk');

Route::get('/PP/{kodebrg_id}/masterbarang', [PermintaanPembelianController::class, 'getMasterBrg']);

Route::post('/PP/{PP}/addtobm', [PermintaanPembelianController::class, 'AddtoBM'])->name('addToBm');
Route::post('/PP/{PP}/batalbm', [PermintaanPembelianController::class, 'BatalBM'])->name('batalBm');



// Route::match(['get', 'post'], '/edit/{id}', 'KelolaBrgController@edit');
// Route::post('edit/{id}', 'KelolaBrgController@edit');

// Route::get('/invoice', function () {
//     return view('Invoice',[
//         "tittle" => "Invoice" 
//     ]);
// });
// Route::get('/lap', function () {
//     return view('laporan',[
//         "tittle" => "Laporan" 
//     ]);
// });
// Route::get('/brgkl', function () {
//     return view('BK',[
//         "tittle" => "Barang Keluar" 
//     ]);
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
