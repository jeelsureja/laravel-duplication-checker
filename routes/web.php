<?php

use Illuminate\Support\Facades\Route;
use Jeelsureja\LaravelDuplicationChecker\Controllers\DuplicationController;

Route::get(config('duplication.warning_route'), [DuplicationController::class, 'index']);
