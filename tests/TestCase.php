<?php

namespace Vincentkos\BlurValidation\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Vincentkos\BlurValidation\BlurValidationServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            BlurValidationServiceProvider::class,
        ];
    }
}
