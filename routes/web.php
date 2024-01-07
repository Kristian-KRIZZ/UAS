<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Route untuk Data Buku
Route::get('/buku', 'BukuController@bukutampil');
Route::post('/buku/tambah','BukuController@bukutambah');
Route::get('/buku/hapus/{id_buku}','BukuController@bukuhapus');
Route::put('/buku/edit/{id_buku}', 'BukuController@bukuedit');

//Route untuk Data Buku
Route::get('/home', function(){return view('view_home');});

//Route untuk Data Anggota
Route::get('/anggota', 'AnggotaController@anggotatampil');
Route::post('/anggota/tambah', 'AnggotaController@anggotatambah');
Route::get('/anggota/hapus/{id_anggota}', 'AnggotaController@anggotahapus');
Route::put('/anggota/edit/{id_anggota}', 'AnggotaController@anggotaedit');

//Route untuk Data Petugas
Route::get('/petugas', 'PetugasController@petugastampil');
Route::post('/petugas/tambah', 'PetugasController@petugastambah');
Route::get('/petugas/hapus/{id_petugas}', 'PetugasController@petugashapus');
Route::put('/petugas/edit/{id_petugas}', 'PetugasController@petugasedit');

//Route untuk Data Peminjaman
Route::get('/pinjam', 'PinjamController@pinjamtampil');
Route::post('/pinjam/tambah','PinjamController@pinjamtambah');
Route::get('/pinjam/hapus/{id_pinjam}','PinjamController@pinjamhapus');
Route::put('/pinjam/edit/{id_pinjam}', 'PinjamController@pinjamedit');

//Route untuk Data Pengembalian
Route::get('/pengembalian', 'PengembalianController@pengembaliantampil');
Route::post('/pengembalian/tambah','pengembalianController@pengembaliantambah');
Route::get('/pengembalian/hapus/{id_pengembalian}','pengembalianController@pengembalianhapus');
Route::put('/pengembalian/edit/{id_pengembalian}', 'pengembalianController@pengembalianedit');
});