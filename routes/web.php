<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\IssueTagController;
use App\Http\Controllers\IssueUserController;
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

    Route::resource('projects', ProjectController::class);

    Route::resource('issues', IssueController::class);

    Route::post('/issues/{issue}/tags', [IssueTagController::class, 'store'])->name('issues.tags.store');
    Route::delete('/issues/{issue}/tags/{tag}', [IssueTagController::class, 'destroy'])->name('issues.tags.destroy');

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');

    Route::get('/issues/{issue}/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/issues/{issue}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::post('/issues/{issue}/users', [IssueUserController::class, 'store']);
    Route::delete('/issues/{issue}/users/{user}', [IssueUserController::class, 'destroy']);
});
