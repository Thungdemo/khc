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