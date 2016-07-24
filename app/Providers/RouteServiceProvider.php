<?php

namespace Reflex\Scorpio\Providers;

use Reflex\Scorpio\Page;
use Reflex\Scorpio\Theme;
use Illuminate\Routing\Router;
use Reflex\Scorpio\Http\Controllers\DisplayController;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Reflex\Scorpio\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->bind('pageBySlug', function ($value) {
            if ($page = Page::whereSlug($value)->first()) {
                return $page;
            }

            return redirect('/');
        });

        $router->bind('themeByDirectory', function ($value) {
            return Theme::wherePath($value)->first();
        });

        if (! app()->runningInConsole()) {
            foreach (Page::all() as $page) {
                $router->get($page->uri, ['as' => $page->route_name, function () use ($page, $router) {
                    return $this->app->call('Reflex\Scorpio\Http\Controllers\DisplayController@show', [
                        'page' => $page,
                        'parameters' => $router->current()->parameters(),
                    ]);
                }]);
            }
        }
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
