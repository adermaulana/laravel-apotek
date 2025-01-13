<?php

use App\Models\Obat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ObatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminObatController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminPemasokController;
use App\Http\Controllers\AdminPembelianController;
use App\Http\Controllers\AdminPenjualanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'obatTerbaru' => Obat::take(3)->get(),
    ]);
})->name('home');

Route::get('/admin', function () {
    // Menghitung jumlah obat
    $jumlah_obat = DB::table('data_obat')->count();

    // Menghitung jumlah pemasok
    $jumlah_pemasok = DB::table('data_pemasok')->count();

    // Mendapatkan total penjualan
    $total_penjualan = DB::table('data_order')->sum('total_order');

    // Mendapatkan total pembelian
    $total_pembelian = DB::table('data_pembelian')->sum('total_pembelian');

    // Kirim data ke view
    return view('admin.index', compact('jumlah_obat', 'jumlah_pemasok', 'total_penjualan', 'total_pembelian'));
})
    ->name('admin')
    ->middleware('auth');

Route::resource('/admin/obat', AdminObatController::class);
Route::resource('/admin/pemasok', AdminPemasokController::class);
Route::resource('/admin/pembelian', AdminPembelianController::class);

//penjualan
Route::get('/admin/penjualan', [AdminPenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/admin/penjualan/{id}', [AdminPenjualanController::class, 'show'])->name('penjualan.show');
Route::delete('/admin/penjualan/{id}', [AdminPenjualanController::class, 'destroy'])->name('penjualan.destroy');
Route::post('/admin/penjualan/konfirmasi', [AdminPenjualanController::class, 'konfirmasi'])->name('penjualan.konfirmasi');
Route::post('/admin/penjualan/tolak', [AdminPenjualanController::class, 'tolak'])->name('penjualan.tolak');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/obat', [ObatController::class, 'index'])->name('obat');
Route::get('/obat/{id}', [ObatController::class, 'detail'])->name('obat.detail');
Route::post('/obat/add-to-cart', [ObatController::class, 'addToCart'])->name('obat.addToCart');
Route::get('/keranjang', [ObatController::class, 'keranjang'])->name('keranjang');
Route::get('/keranjang/{id}', [ObatController::class, 'keranjang'])->name('keranjang.hapus');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
Route::get('/pembayaran/konfirmasi/{id}', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');
Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
