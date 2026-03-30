<?php

use App\Http\Controllers\ChirperController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChirperController::class, 'index']);
