<?php

use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [SessionController::class, 'store'])->name('login');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::controller(ProjectController::class)->group(function() {
    Route::get('/projects', 'index')->name('projects.index');
    Route::get('/projects/create', 'create')->name('projects.create');
    Route::post('/projects', 'store')->name('projects.store');
    Route::get('/projects/{project}', 'show')->name('projects.show');
    Route::get('/projects/{project}/edit', 'edit')->name('projects.edit');
    Route::PUT('/projects/{project}', 'update')->name('projects.update');
    Route::delete('projects/{project}', 'destroy')->name('projects.delete');
});

Route::resource('issues', IssueController::class);
