<?php

// Files

Breadcrumbs::register('admin.files.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(Str::title(trans('files::global.name')), route('admin.files.index'));
});

// Breadcrumbs::register('admin.files.edit', function ($breadcrumbs, $file) {
//     $breadcrumbs->parent('admin.files.index');
//     $breadcrumbs->push($file->filename, route('admin.files.edit', $file->id));
// });

// Breadcrumbs::register('admin.files.create', function ($breadcrumbs) {
//     $breadcrumbs->parent('admin.files.index');
//     $breadcrumbs->push(trans('files::global.New'), route('admin.files.create'));
// });

// Files linked to modules
$modulesWithFiles = array('pages', 'events', 'news', 'projects');

foreach ($modulesWithFiles as $module) {

    Breadcrumbs::register('admin.' . $module . '.files.index', function ($breadcrumbs, $model) use ($module) {
        $breadcrumbs->parent('admin.' . $module . '.edit', $model);
        $breadcrumbs->push(
            Str::title(trans_choice('files::global.files', 2)),
            route('admin.' . $module . '.files.index', $model->id)
        );
    });

    Breadcrumbs::register('admin.' . $module . '.files.edit', function ($breadcrumbs, $model, $file) use ($module) {
        $breadcrumbs->parent('admin.' . $module . '.files.index', $model);
        $breadcrumbs->push($file->filename, route('admin.' . $module . '.index'));
    });

    Breadcrumbs::register('admin.' . $module . '.files.create', function ($breadcrumbs, $model) use ($module) {
        $breadcrumbs->parent('admin.' . $module . '.files.index', $model);
        $breadcrumbs->push(trans('files::global.New'), route('admin.' . $module . '.index'));
    });

}
