<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerBuku;
use App\Http\Controllers\KategoriController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/buku', [ControllerBuku::class, 'index'])->name('buku.index');
    Route::get('/buku/search', [ControllerBuku::class, 'search'])->name('buku.search');
    Route::get('/detail-buku/{title}', [ControllerBuku::class, 'galeri_buku'])->name('galeri.buku');
    Route::post('/buku/rate/{id}', [ControllerBuku::class, 'rateBuku'])->name('buku.rate');
    Route::post('/buku/{id}/favorite', [ControllerBuku::class, 'addToFavorites'])->name('buku.favorite');
    Route::get('/buku/myfavorites', [ControllerBuku::class, 'myFavorites'])->name('buku.myfavorites');
    Route::get('/buku-populer', [ControllerBuku::class, 'bukuPopuler'])->name('buku.populer');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/buku/create', [ControllerBuku::class, 'create'])->name('buku.create');
    Route::post('/buku', [ControllerBuku::class, 'store'])->name('buku.store');
    Route::delete('/buku/{id}', [ControllerBuku::class, 'destroy'])->name('buku.destroy');
    Route::get('/buku/edit/{id}', [ControllerBuku::class, 'edit'])->name('buku.edit');
    Route::post('/buku/update/{id}', [ControllerBuku::class, 'update'])->name('buku.update');
    Route::delete('/buku/{buku}/gallery/{gallery}', [ControllerBuku::class, 'deleteGallery'])->name('buku.deleteGallery');
    Route::resource('kategori', KategoriController::class);
});


require __DIR__.'/auth.php';
