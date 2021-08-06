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
Route::get('/register', [App\Http\Controllers\PublicController::class, 'register'])->name('register');
Route::post('/register_act', [App\Http\Controllers\PublicController::class, 'register_act'])->name('register_act');


Route::get('/perencanaan', [App\Http\Controllers\PublicController::class, 'perencanaan'])->name('perencanaan');
Route::get('/informasi', [App\Http\Controllers\PublicController::class, 'informasi'])->name('informasi');
Route::get('/pengukuran', [App\Http\Controllers\PublicController::class, 'about'])->name('pengukuran');
Route::get('/evaluasi', [App\Http\Controllers\PublicController::class, 'about'])->name('evaluasi');
Route::get('/peraturan', [App\Http\Controllers\Front\PeraturanController::class, 'index'])->name('peraturan');

Route::get('/pelaporan', [App\Http\Controllers\PublicController::class, 'pelaporan'])->name('pelaporan');

Route::prefix('api')->name('api.')->group(function () {
    Route::get('perencanaan', [App\Http\Controllers\PublicController::class, 'api'])->name('perencanaan');
    Route::get('peraturan', [App\Http\Controllers\Front\PeraturanController::class, 'api'])->name('peraturan');

    // gettotal
});
// index end

Route::get('/Akses', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/loginact', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('loginact');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/index.html', [App\Http\Controllers\HomeController::class, 'index'])->name('index.html');

    Route::prefix('master')->name('master.')->group(function () {
        Route::resource('unitkerja', App\Http\Controllers\TmunitkerjaController::class);
        Route::resource('uploaddownload', App\Http\Controllers\TmuploaddonwloadController::class);
        Route::resource('instansi', App\Http\Controllers\TminstansiController::class);
        Route::resource('informasi', App\Http\Controllers\TminformasiController::class);
        Route::resource('halaman', App\Http\Controllers\TmhalamanController::class);
        Route::resource('tahun', App\Http\Controllers\TmtahunopdController::class);
        Route::resource('tmparamterdoc', App\Http\Controllers\TmparameterdocController::class);

        // addd resources
        Route::resource('sasaran', App\Http\Controllers\SasaranController::class);
        Route::resource('indikatorsasaran', App\Http\Controllers\IndikatorsasaranController::class);
        Route::resource('targetkerja', App\Http\Controllers\TargetkerjaController::class);
        Route::resource('targetpembiayaan', App\Http\Controllers\TargetpembiayaanController::class);
        Route::resource('capaiankerja', App\Http\Controllers\CapaiankerjaController::class);
        Route::resource('capaianpembiayaan', App\Http\Controllers\CapaianpembiayaanController::class);
        Route::resource('realisasipembiayaan', App\Http\Controllers\RealisasipembiayaanController::class);
        Route::resource('programkegiatan', App\Http\Controllers\ProgramkegiatanController::class);
        Route::resource('peraturan', App\Http\Controllers\PeraturanController::class);
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('profil.aspx', [App\Http\Controllers\UserController::class, 'profile'])->name('profil.aspx');
        Route::post('update', [App\Http\Controllers\UserController::class, 'profilesave'])->name('update');
    });
    Route::prefix('api')->name('api.')->group(function () {
        Route::post('unitkerja', [App\Http\Controllers\TmunitkerjaController::class, 'api'])->name('unitkerja');
        Route::post('uploaddownload', [App\Http\Controllers\TmuploaddonwloadController::class, 'api'])->name('uploaddownload');
        Route::post('instansi', [App\Http\Controllers\TminstansiController::class, 'api'])->name('instansi');
        Route::post('informasi', [App\Http\Controllers\TminformasiController::class, 'api'])->name('informasi');
        Route::post('halaman', [App\Http\Controllers\TmhalamanController::class, 'api'])->name('halaman');
        Route::get('tahun', [App\Http\Controllers\TmtahunopdController::class, 'api'])->name('tahun');
        Route::post('tmparamterdoc', [App\Http\Controllers\TmparameterdocController::class, 'api'])->name('tmparamterdoc');
        // gettotal
    });

    Route::prefix('apimaster')->name('apimaster.')->group(function () {
        Route::get('peraturan', [App\Http\Controllers\PeraturanController::class, 'api'])->name('peraturan');
    });
});


Auth::routes([
    'register' => false,
    'login' => false,
]);
