<?php

use App\Http\Controllers\App\PageContentController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
Route::get('/{slug}', [PageContentController::class, 'show'])->name('page.content.show');
