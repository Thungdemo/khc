<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('admin.dashboard.index'));
});

Breadcrumbs::for('admin.notice.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Notice Board', route('admin.notice.index'));
});
Breadcrumbs::for('admin.notice.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.notice.index');
    $trail->push('Create');
});
Breadcrumbs::for('admin.notice.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.notice.index');
    $trail->push('Edit');
});

// Calendar Breadcrumbs
Breadcrumbs::for('admin.calendar.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Calendar Events', route('admin.calendar.index'));
});

Breadcrumbs::for('admin.calendar.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.calendar.index');
    $trail->push('Create Event');
});

Breadcrumbs::for('admin.calendar.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.calendar.index');
    $trail->push('Edit Event');
});

// Statistics Breadcrumbs
Breadcrumbs::for('admin.statistics.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Statistics', route('admin.statistics.index'));
});

Breadcrumbs::for('admin.statistics.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.statistics.index');
    $trail->push('Add Statistics');
});

Breadcrumbs::for('admin.statistics.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.statistics.index');
    $trail->push('Edit Statistics');
});

// Album Breadcrumbs
Breadcrumbs::for('admin.album.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Albums', route('admin.album.index'));
});

Breadcrumbs::for('admin.album.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.album.index');
    $trail->push('Create Album');
});

Breadcrumbs::for('admin.album.edit', function (BreadcrumbTrail $trail, $album) {
    $trail->parent('admin.album.index');
    $trail->push('Edit Album');
});

// Station Judge Breadcrumbs
Breadcrumbs::for('admin.station-judge.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Station Judges', route('admin.station-judge.index'));
});

Breadcrumbs::for('admin.station-judge.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.station-judge.index');
    $trail->push('Create Station Judge');
});

Breadcrumbs::for('admin.station-judge.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.station-judge.index');
    $trail->push('Edit Station Judge');
});

// Former Judge Breadcrumbs
Breadcrumbs::for('admin.former-judge.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Former Judges', route('admin.former-judge.index'));
});

Breadcrumbs::for('admin.former-judge.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.former-judge.index');
    $trail->push('Create Former Judge');
});

Breadcrumbs::for('admin.former-judge.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.former-judge.index');
    $trail->push('Edit Former Judge');
});

// Registry Official Breadcrumbs
Breadcrumbs::for('admin.registry-official.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Registry Officials', route('admin.registry-official.index'));
});

Breadcrumbs::for('admin.registry-official.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.registry-official.index');
    $trail->push('Create Registry Official');
});

Breadcrumbs::for('admin.registry-official.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.registry-official.index');
    $trail->push('Edit Registry Official');
});

// Advocate General Breadcrumbs
Breadcrumbs::for('admin.advocate-general.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Advocate General', route('admin.advocate-general.index'));
});

Breadcrumbs::for('admin.advocate-general.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.advocate-general.index');
    $trail->push('Create Advocate General');
});

Breadcrumbs::for('admin.advocate-general.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.advocate-general.index');
    $trail->push('Edit Advocate General');
});

// Legal Committee Breadcrumbs
Breadcrumbs::for('admin.legal-committee.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Legal Committee', route('admin.legal-committee.index'));
});

Breadcrumbs::for('admin.legal-committee.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.legal-committee.index');
    $trail->push('Create Legal Committee');
});

Breadcrumbs::for('admin.legal-committee.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.legal-committee.index');
    $trail->push('Edit Legal Committee');
});

// Gallery Image Breadcrumbs
Breadcrumbs::for('admin.gallery-image.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Gallery Images', route('admin.gallery-image.index'));
});

Breadcrumbs::for('admin.gallery-image.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.gallery-image.index');
    $trail->push('Create Gallery Image');
});

// Activity Breadcrumbs
Breadcrumbs::for('admin.activity.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Activities', route('admin.activity.index'));
});

Breadcrumbs::for('admin.activity.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.activity.index');
    $trail->push('Create Activity');
});

Breadcrumbs::for('admin.activity.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.activity.index');
    $trail->push('Edit Activity');
});

// Form Download Breadcrumbs
Breadcrumbs::for('admin.form-download.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Form Downloads', route('admin.form-download.index'));
});

Breadcrumbs::for('admin.form-download.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.form-download.index');
    $trail->push('Create Form Download');
});

Breadcrumbs::for('admin.form-download.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.form-download.index');
    $trail->push('Edit Form Download');
});

// User Breadcrumbs
Breadcrumbs::for('admin.user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');
    $trail->push('Users', route('admin.user.index'));
});

Breadcrumbs::for('admin.user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.user.index');
    $trail->push('Create User');
});

Breadcrumbs::for('admin.user.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.user.index');
    $trail->push('Edit User');
});
