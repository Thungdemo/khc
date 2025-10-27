<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Portal\HomeController;
use App\Http\Controllers\Portal\ImageController;
use App\Http\Controllers\Portal\NoticeController;
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

    Route::get('notices', [App\Http\Controllers\Admin\NoticeController::class, 'index'])->name('notice.index');
    Route::get('notices/create', [App\Http\Controllers\Admin\NoticeController::class, 'create'])->name('notice.create');
    Route::post('notices', [App\Http\Controllers\Admin\NoticeController::class, 'store'])->name('notice.store');
    Route::get('notices/{notice}/edit', [App\Http\Controllers\Admin\NoticeController::class, 'edit'])->name('notice.edit');
    Route::put('notices/{notice}', [App\Http\Controllers\Admin\NoticeController::class, 'update'])->name('notice.update');
    Route::delete('notices/{notice}', [App\Http\Controllers\Admin\NoticeController::class, 'destroy'])->name('notice.destroy');

    Route::get('registries', [App\Http\Controllers\Admin\RegistryOfficialController::class, 'index'])->name('registry-official.index');
    Route::get('registries/create', [App\Http\Controllers\Admin\RegistryOfficialController::class, 'create'])->name('registry-official.create');
    Route::post('registries', [App\Http\Controllers\Admin\RegistryOfficialController::class, 'store'])->name('registry-official.store');
    Route::get('registries/{registryOfficial}/edit', [App\Http\Controllers\Admin\RegistryOfficialController::class, 'edit'])->name('registry-official.edit');
    Route::put('registries/{registryOfficial}', [App\Http\Controllers\Admin\RegistryOfficialController::class, 'update'])->name('registry-official.update');
    Route::delete('registries/{registryOfficial}', [App\Http\Controllers\Admin\RegistryOfficialController::class, 'destroy'])->name('registry-official.destroy');
});

Route::name('portal.')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home.index');
    Route::get('notices/{noticeCategory}',[NoticeController::class,'index'])->name('notice.index');
    Route::get('gallery', [ImageController::class, 'index'])->name('image.index');
});


