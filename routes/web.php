<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Sensiple\Blog\App\Http\Controllers\Admin\FormSubmissionController;


Route::middleware(['seo'])->group(function () {

    Route::get('/', [HomeController::class, 'home'])->middleware('seo');
    Route::get('/blogs', [BlogController::class, 'blogs']);
    Route::get('/blogs/{slug}', [BlogController::class, 'blogDetails']);
    Route::get('/case-study', [CaseStudyController::class, 'casestudy']);
    Route::get('/case-study/{slug}', [CaseStudyController::class, 'casestudyDetails']);
    Route::get('/services', [ServiceController::class, 'service']);
    Route::get('/ramp-service', [ServiceController::class, 'rampServiceDetails']);
    Route::get('/data-ai-service', [ServiceController::class, 'dataAiServiceDetails']);
    Route::get('/google-workspace-service', [ServiceController::class, 'googleWorkspaceServiceDetails']);
    Route::get('/contact-center-service', [ServiceController::class, 'contactCenterServiceDetails']);
    Route::get('/contact', [ContactController::class, 'contact']);
    Route::get('/privacy-policy', [PolicyController::class, 'privacypolicy']);
    Route::get('/support-policy', [PolicyController::class, 'supportpolicy']);
    Route::get('/terms-conditions', [PolicyController::class, 'termsconditions']);
});


Route::post('form-submission/{slug}', [FormSubmissionController::class, 'store']);
