<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Sensiple\Permission\App\Http\Controllers\Admin\PermissionController;
use Sensiple\Permission\App\Http\Controllers\Admin\PermissionGroupController;
use Sensiple\Permission\App\Http\Controllers\Admin\RoleController;
use Sensiple\Permission\App\Http\Controllers\Admin\UserRolePermissionController;

Route::get('permission', function () {
    dd('permission');
});
Route::middleware(['web', 'userauthcheck'])->prefix('permission')->group(function () {



    Route::prefix('admin')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('permissions-groups', PermissionGroupController::class);
        Route::resource('users-roles-permissions', UserRolePermissionController::class);
    });
});
