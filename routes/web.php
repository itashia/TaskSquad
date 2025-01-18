<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], static function ($router){

    // Admin

    $router->get('/', \App\Livewire\Support\Admin\Index::class)->name('admin.index');
    $router->get('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

    // Users

    $router->get('/users', \App\Livewire\Support\Users\Index::class)->name('users.index')->middleware('can:users_index');
    $router->get('/users/create', \App\Livewire\Support\Users\Create::class)->name('users.create')->middleware('can:users_index');
    $router->get('/users/user/{user}', \App\Livewire\Support\Users\Edit::class)->name('users.edit')->middleware('can:users_index');
    $router->get('/users/trash', \App\Livewire\Support\Users\Trash::class)->name('users.trash')->middleware('can:users_index');
    $router->get('/users/{user}/permissions', \App\Livewire\Support\Users\PermissionUser::class)->name('permissionUser.create')->middleware('can:users_index');

    // Groups

    $router->get('/groups', \App\Livewire\Support\Groups\Index::class)->name('groups.index')->middleware('can:groups_index');
    $router->get('/groups/create', \App\Livewire\Support\Groups\Create::class)->name('groups.create')->middleware('can:groups_index', 'can:creates_index');

    // Roles

    $router->get('/roles', \App\Livewire\Support\Roles\Index::class)->name('roles.index')->middleware('can:roles_index');
    $router->get('/roles/create', \App\Livewire\Support\Roles\Create::class)->name('roles.create')->middleware('can:roles_index', 'can:creates_index');

    // Permissions

    $router->get('/permissions', \App\Livewire\Support\Permissions\Index::class)->name('permissions.index')->middleware('can:permissions_index');;
    $router->get('/permissions/create', \App\Livewire\Support\Permissions\Create::class)->name('permissions.create')->middleware('can:permissions_index', 'can:creates_index');

    // Tasks

    $router->get('/tasks', \App\Livewire\Support\Tasks\Index::class)->name('tasks.index')->middleware('can:tasks_index');
    $router->get('/tasks/create', \App\Livewire\Support\Tasks\Create::class)->name('tasks.create')->middleware('can:tasks_index', 'can:creates_index');
    $router->get('/tasks/{id}/status', \App\Livewire\Support\Tasks\Status::class)->name('tasks.status')->middleware('can:tasks_index');
    $router->get('/tasks/{id}/show', \App\Livewire\Support\Tasks\Show::class)->name('tasks.show')->middleware('can:tasks_index');

    // Projects

    $router->get('/projects', \App\Livewire\Support\Projects\Index::class)->name('projects.index')->middleware('can:projects_index');
    $router->get('/projects/create', \App\Livewire\Support\Projects\Create::class)->name('projects.create')->middleware('can:projects_index', 'can:creates_index');
    $router->get('/projects/{id}/status', \App\Livewire\Support\Projects\Status::class)->name('projects.status')->middleware('can:projects_index');
    $router->get('/projects/{id}/show', \App\Livewire\Support\Projects\Show::class)->name('projects.show')->middleware('can:projects_index');
});
