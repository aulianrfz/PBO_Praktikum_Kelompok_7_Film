<?php


use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ExcelController;





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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get', 'post'], 'tambah', 'tambahAkun')->name('add');
            Route::match(['get', 'post'], '{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });

    Route::controller(TiketController::class)
        ->prefix('tiket')
        ->as('tiket.')
        ->group(function () {
            Route::get('/tikets', [TiketController::class, 'index'])->name('tikets');
            Route::get('/formtiket', [TiketController::class, 'create'])->name('formtiket');
            Route::post('/store', [TiketController::class, 'store'])->name('store');
            Route::get('/show/{id}', [TiketController::class, 'show'])->name('show');
            Route::get('/tiket/{id}/edit', [TiketController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [TiketController::class, 'update'])->name('update');
            Route::get('/tampilkandata/{id}', [TiketController::class, 'tampilkandata'])->name('tampilkandata');
            Route::delete('destroy/{id}', [TiketController::class, 'destroy'])->name('destroy');
        });

    Route::controller(FilmController::class)
        ->prefix('film')
        ->as('film.')
        ->group(function () {
            // Route::get('/formfilm', [FilmController::class, 'tambahdatafilm'])->name('tambahdatafilm');
            // Route::post('/insertdatafilm', [FilmController::class, 'insertdatafilm'])->name('insertdatafilm');
            // Route::get('/films', [FilmController::class, 'index'])->name('films');
            Route::get('/formfilm', [FilmController::class, 'create'])->name('formfilm');
            Route::post('/store', [FilmController::class, 'store'])->name('store');
            Route::get('/films', [FilmController::class, 'index'])->name('films');
            Route::get('/show/{id}', [FilmController::class, 'show'])->name('show');
            Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [FilmController::class, 'update'])->name('update');
            Route::get('/tampilkandata/{id}', [FilmController::class, 'tampilkandata'])->name('tampilkandata');
            Route::delete('destroy/{id}', [FilmController::class, 'destroy'])->name('destroy');
        });


    Route::controller(PembayaranController::class)
        ->prefix('pembayaran')
        ->as('pembayaran.')
        ->group(function () {
            Route::get('/pembayarans', [PembayaranController::class, 'index'])->name('pembayarans');
            Route::get('/formpembayaran', [PembayaranController::class, 'create'])->name('formpembayaran');
            Route::post('/store', [PembayaranController::class, 'store'])->name('store');
            Route::get('/show/{id}', [PembayaranController::class, 'show'])->name('show');
            Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [TiketController::class, 'update'])->name('update');
            Route::get('/tampilkandata/{id}', [TiketController::class, 'tampilkandata'])->name('tampilkandata');
            Route::delete('destroy/{id}', [TiketController::class, 'destroy'])->name('destroy');
        });

});

Route::get('/create-word-document', [WordController::class, 'createWordDocument']);
Route::get('/create-excel-documentfilm', [ExcelController::class, 'exportFilms']);
Route::get('/create-excel-documenttiket', [ExcelController::class, 'exportTikets']);
Route::get('/create-excel-documentpembelian', [ExcelController::class, 'exportPembelians']);



Route::controller(FilmController::class)
    ->prefix('tampilan')
    ->as('tampilan.')
    ->group(function () {
        Route::get('/dashboard', [FilmController::class, 'showdashboard'])->name('showdashboard');
        Route::get('/profil/{id}', [FilmController::class, 'showprofil'])->name('showprofil');
    });
;


Route::group(['prefix' => 'dashboard/user'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::controller(FilmController::class)
        ->prefix('tampilan')
        ->as('tampilan.')
        ->group(function () {
            Route::get('/dashboard', [FilmController::class, 'showdashboard'])->name('showdashboard');
            Route::get('/profil/{id}', [FilmController::class, 'showprofil'])->name('showprofil');
        });

    Route::controller(TiketController::class)
        ->prefix('tiket')
        ->as('tiket.')
        ->group(function () {
            Route::get('/tikets', [TiketController::class, 'index'])->name('tikets');
            Route::get('/formtiket', [TiketController::class, 'create'])->name('formtiket');
            Route::post('/store', [TiketController::class, 'store'])->name('store');
            Route::get('/show/{id}', [TiketController::class, 'show'])->name('show');
            Route::get('/tiket/{id}/edit', [TiketController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [TiketController::class, 'update'])->name('update');
            Route::get('/tampilkandata/{id}', [TiketController::class, 'tampilkandata'])->name('tampilkandata');
            Route::delete('destroy/{id}', [TiketController::class, 'destroy'])->name('destroy');
        });

    Route::controller(FilmController::class)
        ->prefix('film')
        ->as('film.')
        ->group(function () {
            // Route::get('/formfilm', [FilmController::class, 'tambahdatafilm'])->name('tambahdatafilm');
            // Route::post('/insertdatafilm', [FilmController::class, 'insertdatafilm'])->name('insertdatafilm');
            // Route::get('/films', [FilmController::class, 'index'])->name('films');
            Route::get('/formfilm', [FilmController::class, 'create'])->name('formfilm');
            Route::post('/store', [FilmController::class, 'store'])->name('store');
            Route::get('/films', [FilmController::class, 'index'])->name('films');
            Route::get('/show/{id}', [FilmController::class, 'show'])->name('show');
            Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [FilmController::class, 'update'])->name('update');
            Route::get('/tampilkandata/{id}', [FilmController::class, 'tampilkandata'])->name('tampilkandata');
            Route::delete('destroy/{id}', [FilmController::class, 'destroy'])->name('destroy');
        });


    Route::controller(PembayaranController::class)
        ->prefix('pembayaran')
        ->as('pembayaran.')
        ->group(function () {
            Route::get('/pembayarans', [PembayaranController::class, 'index'])->name('pembayarans');
            Route::get('/formpembayaran', [PembayaranController::class, 'create'])->name('formpembayaran');
            Route::post('/store', [PembayaranController::class, 'store'])->name('store');
            Route::get('/show/{id}', [PembayaranController::class, 'show'])->name('show');
            Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [TiketController::class, 'update'])->name('update');
            Route::get('/tampilkandata/{id}', [TiketController::class, 'tampilkandata'])->name('tampilkandata');
            Route::delete('destroy/{id}', [TiketController::class, 'destroy'])->name('destroy');
        });

});