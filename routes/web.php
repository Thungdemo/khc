<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Portal\HomeController;
use App\Http\Controllers\Portal\GalleryImageController;
use App\Http\Controllers\Portal\NoticeController;
use App\Http\Controllers\Admin\DashboardController;


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

    Route::get('former-judges', [App\Http\Controllers\Admin\FormerJudgeController::class, 'index'])->name('former-judge.index');
    Route::get('former-judges/create', [App\Http\Controllers\Admin\FormerJudgeController::class, 'create'])->name('former-judge.create');
    Route::post('former-judges', [App\Http\Controllers\Admin\FormerJudgeController::class, 'store'])->name('former-judge.store');
    Route::get('former-judges/{formerJudge}/edit', [App\Http\Controllers\Admin\FormerJudgeController::class, 'edit'])->name('former-judge.edit');
    Route::put('former-judges/{formerJudge}', [App\Http\Controllers\Admin\FormerJudgeController::class, 'update'])->name('former-judge.update');
    Route::delete('former-judges/{formerJudge}', [App\Http\Controllers\Admin\FormerJudgeController::class, 'destroy'])->name('former-judge.destroy');

    Route::get('station-judges', [App\Http\Controllers\Admin\StationJudgeController::class, 'index'])->name('station-judge.index');
    Route::get('station-judges/create', [App\Http\Controllers\Admin\StationJudgeController::class, 'create'])->name('station-judge.create');
    Route::post('station-judges', [App\Http\Controllers\Admin\StationJudgeController::class, 'store'])->name('station-judge.store');
    Route::get('station-judges/{stationJudge}/edit', [App\Http\Controllers\Admin\StationJudgeController::class, 'edit'])->name('station-judge.edit');
    Route::put('station-judges/{stationJudge}', [App\Http\Controllers\Admin\StationJudgeController::class, 'update'])->name('station-judge.update');
    Route::delete('station-judges/{stationJudge}', [App\Http\Controllers\Admin\StationJudgeController::class, 'destroy'])->name('station-judge.destroy');

    Route::get('advocate-generals', [App\Http\Controllers\Admin\AdvocateGeneralController::class, 'index'])->name('advocate-general.index');
    Route::get('advocate-generals/create', [App\Http\Controllers\Admin\AdvocateGeneralController::class, 'create'])->name('advocate-general.create');
    Route::post('advocate-generals', [App\Http\Controllers\Admin\AdvocateGeneralController::class, 'store'])->name('advocate-general.store');
    Route::get('advocate-generals/{advocateGeneral}/edit', [App\Http\Controllers\Admin\AdvocateGeneralController::class, 'edit'])->name('advocate-general.edit');
    Route::put('advocate-generals/{advocateGeneral}', [App\Http\Controllers\Admin\AdvocateGeneralController::class, 'update'])->name('advocate-general.update');
    Route::delete('advocate-generals/{advocateGeneral}', [App\Http\Controllers\Admin\AdvocateGeneralController::class, 'destroy'])->name('advocate-general.destroy');

    Route::get('gallery',[App\Http\Controllers\Admin\GalleryImageController::class, 'index'])->name('gallery-image.index');
    Route::get('gallery/create',[App\Http\Controllers\Admin\GalleryImageController::class, 'create'])->name('gallery-image.create');
    Route::post('gallery',[App\Http\Controllers\Admin\GalleryImageController::class, 'store'])->name('gallery-image.store');
    Route::delete('gallery/{galleryImage}',[App\Http\Controllers\Admin\GalleryImageController::class, 'destroy'])->name('gallery-image.destroy');

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
    Route::post('users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
    Route::get('users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::put('users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::delete('users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');
});

Route::name('portal.')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home.index');
    Route::view('about', 'portal.about')->name('about');
    Route::get('gallery', [GalleryImageController::class, 'index'])->name('image.index');
    Route::get('notices/{noticeCategory}',[NoticeController::class,'index'])->name('notice.index');
    Route::get('station-judges',[App\Http\Controllers\Portal\StationJudgeController::class,'index'])->name('station-judge.index');
    Route::get('former-judges',[App\Http\Controllers\Portal\FormerJudgeController::class,'index'])->name('former-judge.index');
    Route::get('registry-officials',[App\Http\Controllers\Portal\RegistryOfficalController::class,'index'])->name('registry-official.index');
});


