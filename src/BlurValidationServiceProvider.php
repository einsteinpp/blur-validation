<?php

namespace Vincentkos\BlurValidation;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BlurValidationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();

        $this->publishAssets();
    }

    private function registerRoutes()
    {
        Route::namespace('')
            ->middleware('web')
            ->group(__DIR__ . '/../routes/web.php');
    }

    private function publishAssets()
    {
        $this->publishes([
            __DIR__ . '/../js' => public_path('vendor/blur-validation'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/../js' => public_path('vendor/blur-validation'),
        ], 'blur-validation');
    }
}
