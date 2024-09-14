<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\GoogleCloudStorageServiceProvider::class,
    Sensiple\Auth\AuthServiceProvider::class,
    Sensiple\Blog\BlogServiceProvider::class,
    Sensiple\Permission\PermissionServiceProvider::class,
    Sensiple\User\UserServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
];
