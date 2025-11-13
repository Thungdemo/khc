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
