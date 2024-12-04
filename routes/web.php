<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], static function ($router){

    $router->get('/', \App\Livewire\Support\Admin\Index::class)->name('admin.index');
    $router->get('/users', \App\Livewire\Support\Users\Index::class)->name('users.index');

});
