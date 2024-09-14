<?php

namespace Sensiple\Blog;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Sensiple\Blog\App\Http\Middleware\SeoMiddleware as MiddlewareSeoMiddleware;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/blog.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'blog');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('seo', MiddlewareSeoMiddleware::class);
    }
}
