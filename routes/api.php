<?php

use App\Http\Controllers\API\DocuaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('docuai-form-submission', [DocuaiController::class, 'formSubmission']);
