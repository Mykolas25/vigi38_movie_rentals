<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->customPublishes();
        $this->customBladeDirectives();
    }

    private function customBladeDirectives(): void
    {
        Blade::directive('langU', function (string $expression) {
            return "<?= Str::ucfirst(trans($expression)); ?>";
        });

        Blade::directive('langTitle', function (string $expression) {
            return "<?= Str::title(trans($expression)); ?>";
        });
    }

    private function customPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/../../vendor/almasaeed2010/adminlte' => public_path('adminlte'),
        ], 'adminlte');
    }
}
