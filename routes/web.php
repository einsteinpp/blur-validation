<?php

use Illuminate\Support\Facades\Route;
use Vincentkos\BlurValidation\Controllers\BlurValidationController;

Route::post('/__blur-validation__', BlurValidationController::class)
    ->name('blurvalidation.validate');
