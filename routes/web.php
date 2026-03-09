<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\GalleryController;
use App\Models\Student;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('welcome');

Route::get('dashboard', function () {
    return Inertia::render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home' , [HomeController::class , 'index'])->name('home');

Route::get('/about' , [AboutController::class , 'index'])->name('about');

Route::get('/students' , [StudentController::class , 'index'])->name('students');

Route::post('/students/store', [StudentController::class, 'store'] )->name('students.store');

// Route::get('/store' , [StoreController::class , 'index'])->name('store');



Route::get('/store', [StoreController::class, 'index'])->name('show_product');
Route::get('/post/store', [StoreController::class, 'create'])->name('create_product');
Route::post('/post/store', [StoreController::class, 'store'])->name('products.store');

Route::resource('sal3a', StoreController::class)
    ->parameters(['sal3a' => 'store'])
    ->only(['edit', 'update', 'destroy']);

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

require __DIR__.'/settings.php';
