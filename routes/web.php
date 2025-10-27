<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Portal\HomeController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('notices', [NoticeController::class, 'index'])->name('notice.index');
    Route::get('notices/create', [NoticeController::class, 'create'])->name('notice.create');
    Route::post('notices', [NoticeController::class, 'store'])->name('notice.store');
    Route::get('notices/{notice}/edit', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::put('notices/{notice}', [NoticeController::class, 'update'])->name('notice.update');
    Route::delete('notices/{notice}', [NoticeController::class, 'destroy'])->name('notice.destroy');
});

Route::name('portal.')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home.index');
    Route::get('gallery', [App\Http\Controllers\Portal\ImageController::class, 'index'])->name('image.index');
});


