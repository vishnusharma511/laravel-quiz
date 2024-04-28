<?php

use App\Admin\Controllers\SubjectController;
use Illuminate\Routing\Router;
use App\Admin\Controllers\UserSubjectAssignResultController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('/subjects', SubjectController::class);

    $router->resource('/users/subject/assign', UserSubjectAssignResultController::class);
});
