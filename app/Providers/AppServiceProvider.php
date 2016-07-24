<?php

namespace Reflex\Scorpio\Providers;

use Reflex\Scorpio\Theme;
use Reflex\Scorpio\Navigation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Theme::creating(function (Theme $theme) {
            $disk = Storage::disk('layouts');

            if ($disk->exists($theme->path)) {
                return true;
            }

            return File::copyDirectory(
                resource_path('assets/scorpio/theme-stub'),
                resource_path('layouts/' .  $theme->path)
            );
        });

        Theme::updating(function (Theme $theme) {
            if (Storage::disk('layouts')->exists($theme->getOriginal('path'))) {
                return rename($theme->originalFullPath, $theme->fullPath);
            }
        });

        Theme::deleting(function (Theme $theme) {
            $disk = Storage::disk('layouts');

            if (! $disk->exists($theme->path)) {
                return true;
            }

            return $disk->deleteDirectory($theme->path);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
