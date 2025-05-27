<?php

use App\Http\Controllers\Admin\AdminFileController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\AdminPengumumanController;
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\GelombangController;
use App\Http\Controllers\Admin\ProfileSekolahController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\FormPendaftaranController;
use App\Http\Controllers\User\FormulirController;
use App\Http\Controllers\User\RiwayatPendaftaranController;
use App\Http\Controllers\User\UserFileController;
use App\Http\Controllers\User\UserMainController;
use App\Http\Controllers\User\UserPengumumanController;
use App\Livewire\FormPendaftaranSiswa;
use App\Livewire\Formulir;

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

Route::get('/', [FrontController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Role Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function() {

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminMainController::class, 'index'])->name('dashboard');

        //Profile Sekolah
        Route::controller(ProfileSekolahController::class)
        ->prefix('data-pendaftaran')
        ->name('gelombang.')
        ->group(function () {});

        // Gelombang Pendaftaran
        Route::controller(GelombangController::class)
        ->prefix('data-pendaftaran')
        ->name('gelombang.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/show/{gelombang:uuid}', 'show')->name('show');
            Route::get('/edit/{gelombang:uuid}', 'edit')->name('edit');
            Route::put('/{gelombang:uuid}', 'update')->name('update');
            Route::delete('/{gelombang:uuid}', 'destroy')->name('destroy');
        });

        //
    });

    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:user'])
    ->name('user.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard/{user}', [UserMainController::class, 'index'])->name('dashboard');

        //Formulir Pendaftaran
        Route::controller(FormPendaftaranController::class)
        ->prefix('formulir')
        ->name('formulir.')
        ->group(function () {
            Route::get('/gelombang/{gelombang}', 'create')->name('create');
            Route::post('/gelombang/{gelombang}', 'store')->name('store');
        });

        // Riwayat Pendaftaran
        Route::controller(RiwayatPendaftaranController::class)
        ->prefix('riwayat-pendaftaran')
        ->name('riwayat-pendaftaran.')
        ->group(function () {
            Route::get('/{user}', 'index')->name('index');
            Route::get('/detail/{siswa}', 'show')->name('show');
            Route::get('/{siswa}/edit', 'edit')->name('edit');
            Route::put('/{siswa}', 'update')->name('update');
            Route::get('/{siswa}/download', 'download')->name('download');
        });
    });

});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
