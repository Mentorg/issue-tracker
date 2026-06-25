<?php

use App\Http\Controllers\IssueController;
use App\Http\Controllers\IssueTagController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', fn () => view('welcome'))->name('login');
    Route::get('/login', fn () => view('welcome'))->name('login.form');
    Route::post('/login', [SessionController::class, 'store'])->name('login.submit');
});

Route::middleware('auth')->group(function() {
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
    Route::post('/issues/{issue}/tags', [IssueTagController::class, 'store'])->name('issues.tags.store');
    Route::delete('/issues/{issue}/tags/{tag}', [IssueTagController::class, 'destroy'])->name('issues.tags.destroy');

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
});
