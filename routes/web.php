<?php

use App\Http\Controllers\absensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\slip_gajiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\permohonancutiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return view('admin.dashboard');
});

Route::get('karyawan', function () {
    return view('admin.karyawan');
});

Route::get('/', [loginController::class, 'loadLogin'])->name('login');
Route::post('/login',[loginController::class,'login'])->name('login.submit');
Route::get('/logout',[loginController::class,'logout'])->name('logout');

// Admin Routes
Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
    Route::get('/tambahkaryawan', [KaryawanController::class ,'tambahkaryawan'])->name('tambahkaryawan');
    Route::post('/insertkaryawan', [KaryawanController::class, 'insertkaryawan'])->name('insertkaryawan');
    Route::get('/tampilkaryawan/{id_karyawan}', [KaryawanController::class ,'tampilkaryawan'])->name('tampilkaryawan');
    Route::get('/updatekaryawan/{id_karyawan}', [KaryawanController::class, 'tampilUpdateKaryawan'])->name('tampilUpdateKaryawan');
    Route::put('/updatekaryawan/{id_karyawan}', [KaryawanController::class, 'updateKaryawan'])->name('updateKaryawan');

    Route::delete('/deletekaryawan/{id_karyawan}', [KaryawanController::class, 'deletekaryawan'])->name('deletekaryawan');

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('/tambahjabatan', [JabatanController::class ,'tambahjabatan'])->name('tambahjabatan');
    Route::post('/insertjabatan', [JabatanController::class, 'insertjabatan'])->name('insertjabatan');
    Route::get('/tampiljabatan/{id_jabatan}', [JabatanController::class ,'tampiljabatan'])->name('tampiljabatan');
    Route::delete('/deletejabatan/{id_jabatan}', [JabatanController::class, 'deletejabatan'])->name('deletejabatan');
    Route::get('/editjabatan/{id_jabatan}', [JabatanController::class, 'edit'])->name('editjabatan');
    Route::put('/updatejabatan/{id_jabatan}', [JabatanController::class, 'update'])->name('updatejabatan');


    Route::get('/golongan', [GolonganController::class, 'index'])->name('golongan.index');
    Route::get('/slip_gaji', [slip_gajiController::class, 'index'])->name('slip_gaji.index');
    Route::get('/tambahslipgaji', [slip_gajiController::class, 'tambah'])->name('tambahslipgaji');
    Route::get('/slipgaji/{id_gaji}/edit', [slip_gajiController::class, 'edit'])->name('editslipgaji');
    Route::put('/slipgaji/{id_gaji}', [slip_gajiController::class, 'update'])->name('updateslipgaji');
    Route::delete('/slipgaji/{id}', [slip_gajiController::class, 'delete'])->name('slipgaji.destroy');

    Route::post('/simpanslipgaji', [slip_gajiController::class, 'simpanSlipGaji'])->name('simpanslipgaji');
    Route::get('/permohonancuti', [permohonancutiController::class, 'index'])->name('cuti.index');
    Route::get('/absensi', [absensiController::class, 'index'])->name('absensi.index');
});

// Karyawan Routes
Route::group(['prefix' => 'karyawan','middleware'=>['web','isKaryawan']],function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.karyawan');
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.karyawan');
    Route::get('/tambahkaryawan', [KaryawanController::class ,'tambahkaryawan'])->name('tambahkaryawan.karyawan');
    Route::post('/insertkaryawan', [KaryawanController::class, 'insertkaryawan'])->name('insertkaryawan.karyawan');
    Route::get('/tampilkaryawan/{id_karyawan}', [KaryawanController::class ,'tampilkaryawan'])->name('tampilkaryawan.karyawan');
    Route::put('/updatekaryawan/{id_karyawan}', [KaryawanController::class ,'updatekaryawan'])->name('updatekaryawan');
    Route::delete('/deletekaryawan/{id_karyawan}', [KaryawanController::class, 'deletekaryawan'])->name('deletekaryawan.karyawan');
    

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.karyawan');
    Route::get('/golongan', [GolonganController::class, 'index'])->name('golongan.karyawan');
    Route::get('/slip_gaji', [slip_gajiController::class, 'index'])->name('slip_gaji.karyawan');
    Route::get('/permohonancuti', [permohonancutiController::class, 'index2'])->name('permohonancuti');
    Route::get('/absensi', [absensiController::class, 'index'])->name('absensi.karyawan');
    
});



// Manager Routes
Route::group(['prefix' => 'manager','middleware'=>['web','isManager']],function(){
    Route::get('/dashboard-manager', [DashboardController::class, 'index'])->name('dashboard-manager');
    Route::get('/permohonancuti-manager', [permohonancutiController::class, 'index3'])->name('permohonancuti-manager');
});

// Tambahkan rute untuk dashboard karyawan
Route::get('/dashboard-karyawan', [DashboardController::class, 'index'])->name('dashboard-karyawan');

// Tambahkan rute untuk jabatan di luar grup rute karyawan
Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');

// baru 3 mei

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');

// Routes for adding a new employee
Route::get('/karyawan/create', [KaryawanController::class, 'tambahKaryawan'])->name('tambahkaryawan');
Route::post('/karyawan', [KaryawanController::class, 'insertKaryawan'])->name('insertkaryawan');

// Routes for updating an employee
Route::get('/karyawan/{id_karyawan}/edit', [KaryawanController::class, 'tampilKaryawan'])->name('tampilkaryawan');
Route::post('/karyawan/{id_karyawan}', [KaryawanController::class, 'updateKaryawan'])->name('updatekaryawan');

// Route for deleting an employee
Route::delete('/karyawan/{id_karyawan}', [KaryawanController::class, 'deleteKaryawan'])->name('deletekaryawan');


// 8 juni

// 8 juni












?>