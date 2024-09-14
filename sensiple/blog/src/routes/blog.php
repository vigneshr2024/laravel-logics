<?php

use Illuminate\Support\Facades\Route;
use Sensiple\Blog\App\Http\Controllers\Admin\CategoryController;
use Sensiple\Blog\App\Http\Controllers\Admin\AuthorController;
use Sensiple\Blog\App\Http\Controllers\Admin\CasestudyController;
use Sensiple\Blog\App\Http\Controllers\Admin\FormController;
use Sensiple\Blog\App\Http\Controllers\Admin\FormSubmissionController;
use Sensiple\Blog\App\Http\Controllers\Admin\IndustryController;
use Sensiple\Blog\App\Http\Controllers\Admin\TagController;
use Sensiple\Blog\App\Http\Controllers\Admin\MediaController;
use Sensiple\Blog\App\Http\Controllers\Admin\PolicyController;
use Sensiple\Blog\App\Http\Controllers\Admin\PostController;
use Sensiple\Blog\App\Http\Controllers\Admin\SeoController;
use Sensiple\Blog\App\Http\Controllers\Admin\StackController;

Route::get('blog', function () {
    dd('blog package');
});

Route::middleware(['web', 'userauthcheck'])->prefix('blog')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::resource('author', AuthorController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('industry', IndustryController::class);
        Route::resource('casestudy', CasestudyController::class);
        Route::resource('tag', TagController::class);
        Route::resource('media', MediaController::class);
        Route::resource('post', PostController::class);
        Route::resource('seo', SeoController::class);
        Route::resource('form', FormController::class);
        Route::resource('stack', StackController::class);
        Route::get('case-study/{id}', [PostController::class, 'casestudy']);
    });
});

Route::middleware(['web', 'userauthcheck'])->prefix('admin')->group(function () {
    Route::resource('policy', PolicyController::class);
});
//Form-submission
Route::get('form-submissions/export/{id}', [FormSubmissionController::class, 'export']);//->name('form-submissions.export');