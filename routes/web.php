<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('', [App\Http\Controllers\PublicController::class, 'index'])->name('/');
Route::get('index.html', [App\Http\Controllers\PublicController::class, 'index'])->name('index.html');

Route::get('/contact', [App\Http\Controllers\PublicController::class, 'contact'])->name('contact');

Route::get('/about', [App\Http\Controllers\PublicController::class, 'about'])->name('about');
Route::get('/produk', [App\Http\Controllers\PublicController::class, 'produk'])->name('produk');


Route::get('/register', [App\Http\Controllers\PublicController::class, 'register'])->name('register');
Route::get('/transaksi', [App\Http\Controllers\PublicController::class, 'transaksi'])->name('transaksi');

Route::post('/register_act', [App\Http\Controllers\PublicController::class, 'register_act'])->name('register_act');


Route::get('/perencanaan', [App\Http\Controllers\PublicController::class, 'perencanaan'])->name('perencanaan');
Route::get('/informasi', [App\Http\Controllers\PublicController::class, 'informasi'])->name('informasi');
Route::get('/pengukuran', [App\Http\Controllers\PublicController::class, 'about'])->name('pengukuran');
Route::get('/evaluasi', [App\Http\Controllers\PublicController::class, 'about'])->name('evaluasi');
Route::get('/peraturan', [App\Http\Controllers\Front\PeraturanController::class, 'index'])->name('peraturan');
// cart of data
Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
// nnjson barang
Route::get('barang_json', [App\Http\Controllers\CartController::class, 'barang_json'])->name('barang_json');
Route::post('cart.checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');

Route::post('cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');

Route::get('page/{id}', [App\Http\Controllers\PublicController::class, 'page'])->name('page');

Route::get('/pelaporan', [App\Http\Controllers\PublicController::class, 'pelaporan'])->name('pelaporan');

Route::prefix('api')->name('api.')->group(function () {
    Route::get('perencanaan', [App\Http\Controllers\PublicController::class, 'api'])->name('perencanaan');
    Route::get('peraturan', [App\Http\Controllers\Front\PeraturanController::class, 'api'])->name('peraturan');

    // gettotal
});
// index end
Route::group(['middleware' => ['web', 'user']], function () {
    Route::get('dashboarduser', [App\Http\Controllers\PublicController::class, 'dashboarduser'])->name('dashboarduser');
    Route::get('keranjang', [App\Http\Controllers\PublicController::class, 'keranjang'])->name('keranjang');
    Route::get('transaksi', [App\Http\Controllers\PublicController::class, 'transaksi'])->name('transaksi');
});


Route::get('/Akses', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/loginact', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('loginact');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/index.html', [App\Http\Controllers\HomeController::class, 'index'])->name('index.html');

    Route::prefix('master')->name('master.')->group(function () {
        Route::resource('barang', App\Http\Controllers\BarangController::class);
        Route::resource('pesanan', App\Http\Controllers\PesananController::class);
        Route::resource('klien', App\Http\Controllers\KlienController::class);
        Route::resource('transaksi', App\Http\Controllers\PesananController::class);
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('profil.aspx', [App\Http\Controllers\UserController::class, 'profile'])->name('profil.aspx');
        Route::post('update', [App\Http\Controllers\UserController::class, 'profilesave'])->name('update');
    });
    Route::prefix('api')->name('api.')->group(function () {
        Route::post('barang', [App\Http\Controllers\BarangController::class, 'api'])->name('barang');
        Route::post('klien', [App\Http\Controllers\KlienController::class, 'api'])->name('klien');
        Route::post('pesanan', [App\Http\Controllers\PesananController::class, 'api'])->name('pesanan');
        Route::post('halaman', [App\Http\Controllers\TminformasiController::class, 'api'])->name('halaman');
        // gettotal
    });

    Route::prefix('apimaster')->name('apimaster.')->group(function () {
        Route::get('peraturan', [App\Http\Controllers\PeraturanController::class, 'api'])->name('peraturan');
    });
});


Route::get('user.login', [App\Http\Controllers\UserloginController::class, 'login'])->name('user.login');


Auth::routes([
    'register' => false,
    'login' => false,
]);
