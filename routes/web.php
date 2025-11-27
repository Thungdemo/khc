<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Portal\HomeController;
use App\Http\Controllers\Portal\NoticeController;
use App\Http\Controllers\Admin\DashboardController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth',\App\Http\Middleware\DisableCacheMiddleware::class])->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('notices/notice-subcategories', [App\Http\Controllers\Admin\NoticeController::class, 'noticeSubcategory'])->name('notice.notice-subcategory');
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

    Route::get('legal-committees', [App\Http\Controllers\Admin\LegalCommitteeController::class, 'index'])->name('legal-committee.index');
    Route::get('legal-committees/create', [App\Http\Controllers\Admin\LegalCommitteeController::class, 'create'])->name('legal-committee.create');
    Route::post('legal-committees', [App\Http\Controllers\Admin\LegalCommitteeController::class, 'store'])->name('legal-committee.store');
    Route::get('legal-committees/{legalCommittee}/edit', [App\Http\Controllers\Admin\LegalCommitteeController::class, 'edit'])->name('legal-committee.edit');
    Route::put('legal-committees/{legalCommittee}', [App\Http\Controllers\Admin\LegalCommitteeController::class, 'update'])->name('legal-committee.update');
    Route::delete('legal-committees/{legalCommittee}', [App\Http\Controllers\Admin\LegalCommitteeController::class, 'destroy'])->name('legal-committee.destroy');

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

    Route::get('albums', [App\Http\Controllers\Admin\AlbumController::class, 'index'])->name('album.index');
    Route::get('albums/create', [App\Http\Controllers\Admin\AlbumController::class, 'create'])->name('album.create');
    Route::post('albums', [App\Http\Controllers\Admin\AlbumController::class, 'store'])->name('album.store');
    Route::get('albums/{album}/edit', [App\Http\Controllers\Admin\AlbumController::class, 'edit'])->name('album.edit');
    Route::put('albums/{album}', [App\Http\Controllers\Admin\AlbumController::class, 'update'])->name('album.update');
    Route::delete('albums/{album}', [App\Http\Controllers\Admin\AlbumController::class, 'destroy'])->name('album.destroy');
    Route::get('albums/{album}/gallery-images', [App\Http\Controllers\Admin\AlbumController::class, 'galleryImagesCreate'])->name('album.gallery-images.create');
    Route::post('albums/{album}/gallery-images', [App\Http\Controllers\Admin\AlbumController::class, 'galleryImageStore'])->name('album.gallery-images.store');
    Route::patch('albums/{album}/gallery-images/{galleryImage}/set-cover', [App\Http\Controllers\Admin\AlbumController::class, 'setCover'])->name('album.gallery-images.set-cover');
    Route::delete('albums/{album}/gallery-images/{galleryImage}', [App\Http\Controllers\Admin\AlbumController::class, 'galleryImageDestroy'])->name('album.gallery-images.destroy');

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
    Route::post('users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
    Route::get('users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::put('users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::delete('users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');

    Route::get('activities', [App\Http\Controllers\Admin\ActivityController::class, 'index'])->name('activity.index');
    Route::get('activities/create', [App\Http\Controllers\Admin\ActivityController::class, 'create'])->name('activity.create');
    Route::post('activities', [App\Http\Controllers\Admin\ActivityController::class, 'store'])->name('activity.store');
    Route::get('activities/{activity}/edit', [App\Http\Controllers\Admin\ActivityController::class, 'edit'])->name('activity.edit');
    Route::put('activities/{activity}', [App\Http\Controllers\Admin\ActivityController::class, 'update'])->name('activity.update');
    Route::delete('activities/{activity}', [App\Http\Controllers\Admin\ActivityController::class, 'destroy'])->name('activity.destroy');

    Route::get('calendars', [App\Http\Controllers\Admin\CalendarController::class, 'index'])->name('calendar.index');
    Route::get('calendars/create', [App\Http\Controllers\Admin\CalendarController::class, 'create'])->name('calendar.create');
    Route::post('calendars', [App\Http\Controllers\Admin\CalendarController::class, 'store'])->name('calendar.store');
    Route::get('calendars/{calendar}/edit', [App\Http\Controllers\Admin\CalendarController::class, 'edit'])->name('calendar.edit');
    Route::put('calendars/{calendar}', [App\Http\Controllers\Admin\CalendarController::class, 'update'])->name('calendar.update');
    Route::delete('calendars/{calendar}', [App\Http\Controllers\Admin\CalendarController::class, 'destroy'])->name('calendar.destroy');

    Route::get('statistics', [App\Http\Controllers\Admin\StatisticsController::class, 'index'])->name('statistics.index');
    Route::get('statistics/create', [App\Http\Controllers\Admin\StatisticsController::class, 'create'])->name('statistics.create');
    Route::post('statistics', [App\Http\Controllers\Admin\StatisticsController::class, 'store'])->name('statistics.store');
    Route::get('statistics/{statistics}/edit', [App\Http\Controllers\Admin\StatisticsController::class, 'edit'])->name('statistics.edit');
    Route::put('statistics/{statistics}', [App\Http\Controllers\Admin\StatisticsController::class, 'update'])->name('statistics.update');
    Route::delete('statistics/{statistics}', [App\Http\Controllers\Admin\StatisticsController::class, 'destroy'])->name('statistics.destroy');

    Route::get('form-downloads', [App\Http\Controllers\Admin\FormDownloadController::class, 'index'])->name('form-download.index');
    Route::get('form-downloads/create', [App\Http\Controllers\Admin\FormDownloadController::class, 'create'])->name('form-download.create');
    Route::post('form-downloads', [App\Http\Controllers\Admin\FormDownloadController::class, 'store'])->name('form-download.store');
    Route::get('form-downloads/{formDownload}/edit', [App\Http\Controllers\Admin\FormDownloadController::class, 'edit'])->name('form-download.edit');
    Route::put('form-downloads/{formDownload}', [App\Http\Controllers\Admin\FormDownloadController::class, 'update'])->name('form-download.update');
    Route::delete('form-downloads/{formDownload}', [App\Http\Controllers\Admin\FormDownloadController::class, 'destroy'])->name('form-download.destroy');

    Route::get('authentication-logs', [\App\Http\Controllers\Admin\AuthenticationLogController::class, 'index'])->name('authentication-log.index');
});

Route::name('portal.')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home.index');
    Route::view('about', 'portal.about')->name('about');
    Route::get('gallery', [App\Http\Controllers\Portal\AlbumController::class, 'index'])->name('album.index');
    Route::get('gallery/{album}', [App\Http\Controllers\Portal\AlbumController::class, 'show'])->name('album.show');
    Route::get('notices/{noticeCategory}',[NoticeController::class,'index'])->name('notice.index');
    Route::get('station-judges',[App\Http\Controllers\Portal\StationJudgeController::class,'index'])->name('station-judge.index');
    Route::get('former-judges',[App\Http\Controllers\Portal\FormerJudgeController::class,'index'])->name('former-judge.index');
    Route::get('registry-officials',[App\Http\Controllers\Portal\RegistryOfficalController::class,'index'])->name('registry-official.index');
    Route::get('advocate-generals',[App\Http\Controllers\Portal\AdvocateGeneralController::class,'index'])->name('advocate-general.index');
    Route::get('legal-committee',[App\Http\Controllers\Portal\LegalCommitteeController::class,'index'])->name('legal-committee.index');
    Route::get('contact',[App\Http\Controllers\Portal\ContactController::class,'index'])->name('contact.index');
    Route::get('activities',[App\Http\Controllers\Portal\ActivityController::class,'index'])->name('activity.index');
    Route::get('activities/{activity}',[App\Http\Controllers\Portal\ActivityController::class,'show'])->name('activity.show');
    Route::get('statistics',[App\Http\Controllers\Portal\StatisticsController::class,'index'])->name('statistics.index');
    Route::get('form-downloads',[App\Http\Controllers\Portal\FormDownloadController::class,'index'])->name('form-download.index');
    Route::get('library',[App\Http\Controllers\Portal\LibraryController::class,'index'])->name('library.index');
    Route::get('mact', [App\Http\Controllers\Portal\MactController::class, 'index'])->name('mact.index');
});


