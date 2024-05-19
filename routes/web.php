<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\JadwaPickUpController;
use App\Http\Controllers\KatalogSampahController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page.welcome');
});

Route::get('/about', function () {
    return view('landing_page.about');
});
Route::get('/besi', function () {
    return view('landing_page.besi');
});
Route::get('/kaca', function () {
    return view('landing_page.kaca');
});
Route::get('/kaleng', function () {
    return view('landing_page.kaleng');
});
Route::get('/kardus', function () {
    return view('landing_page.kardus');
});
Route::get('/kertas', function () {
    return view('landing_page.kertas');
});
Route::get('/plastik', function () {
    return view('landing_page.plastik');
});

Route::get('/contact', function () {
    return view('landing_page.contact');
});
Route::controller(AuthController::class)->group(function (){
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    
    Route::get('/login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    
    Route::post('logout', 'actionlogout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('beranda',[ DashboardController::class, 'index'] )->name('beranda');

    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->name('user.index');
        Route::get('user-create', 'create')->name('user.create');
        Route::post('user', 'store')->name('user.store');
        Route::get('detail-user-{id}', 'show')->name('user.show');
        Route::get('edit-user-{id}', 'edit')->name('user.edit');
        Route::put('edit-user-{id}', 'update')->name('user.update');
        Route::delete('hapus-user-{id}', 'destroy')->name('user.destroy');
        Route::get('profile-user-{id}', 'showProfile')->name('user.showProfile');
        Route::get('edit-password-user-{id}', 'editPassword')->name('user.editPassword');
        Route::put('update-password-user-{id}', 'updatePassword')->name('user.updatePassword');
    });

    Route::controller(DriverController::class)->group(function () {
        Route::get('driver', 'index')->name('driver.index');
        Route::get('driver-create', 'create')->name('driver.create');
        Route::post('driver', 'store')->name('driver.store');
        Route::get('detail-driver-{id}', 'show')->name('driver.show');
        Route::get('edit-driver-{id}', 'edit')->name('driver.edit');
        Route::put('edit-driver-{id}', 'update')->name('driver.update');
        Route::delete('hapus-driver-{id}', 'destroy')->name('driver.destroy');
    });
    
    Route::controller(KatalogSampahController::class)->group(function () {
        Route::get('katalogSampah', 'index')->name('katalogSampah.index');
        Route::get('katalogSampah-create', 'create')->name('katalogSampah.create');
        Route::post('katalogSampah', 'store')->name('katalogSampah.store');
        Route::get('detail-katalogSampah-{id}', 'show')->name('katalogSampah.show');
        Route::get('edit-katalogSampah-{id}', 'edit')->name('katalogSampah.edit');
        Route::put('edit-katalogSampah-{id}', 'update')->name('katalogSampah.update');
        Route::delete('hapus-katalogSampah-{id}', 'destroy')->name('katalogSampah.destroy');
    });

    Route::controller(AreaController::class)->group(function () {
        Route::get('area', 'index')->name('area.index');
        Route::get('area-create', 'create')->name('area.create');
        Route::post('area', 'store')->name('area.store');
        Route::get('detail-area-{id}', 'show')->name('area.show');
        Route::get('edit-area-{id}', 'edit')->name('area.edit');
        Route::put('edit-area-{id}', 'update')->name('area.update');
        Route::delete('hapus-area-{id}', 'destroy')->name('area.destroy');
    });

    Route::controller(JadwaPickUpController::class)->group(function () {
        Route::get('jadwalPickUp', 'index')->name('jadwalPickUp.index');
        Route::get('jadwalPickUp-create', 'create')->name('jadwalPickUp.create');
        Route::post('jadwalPickUp', 'store')->name('jadwalPickUp.store');
        Route::get('detail-jadwalPickUp-{id}', 'show')->name('jadwalPickUp.show');
        Route::get('edit-jadwalPickUp-{id}', 'edit')->name('jadwalPickUp.edit');
        Route::put('edit-jadwalPickUp-{id}', 'update')->name('jadwalPickUp.update');
        Route::delete('hapus-jadwalPickUp-{id}', 'destroy')->name('jadwalPickUp.destroy');
    });

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('transaksi', 'index')->name('transaksi.index');
        Route::get('transaksi-create', 'create')->name('transaksi.create');
        Route::post('transaksi', 'store')->name('transaksi.store');
        Route::get('detail-transaksi-{id}', 'show')->name('transaksi.show');
        Route::get('edit-transaksi-{id}', 'edit')->name('transaksi.edit');
        Route::put('edit-transaksi-{id}', 'update')->name('transaksi.update');
        Route::put('update-status-transaksi-{id}', 'updateStatus')->name('transaksi.updateStatus');
        Route::delete('hapus-transaksi-{id}', 'destroy')->name('transaksi.destroy');
    });

    Route::controller(DetailTransaksiController::class)->group(function () {
        Route::get('tambah-sampah', 'create')->name('sampah.create');
        Route::post('tambah-sampah', 'store')->name('sampah.store');
        Route::get('edit-sampah-{id}', 'edit')->name('sampah.edit');
        Route::put('edit-sampah-{id}', 'update')->name('sampah.update');
        Route::delete('hapus-sampah-{id}', 'destroy')->name('sampah.destroy');
    });
});