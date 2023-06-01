<?php

use App\Http\Controllers\App\PageContentController;
use App\Http\Controllers\App\PageHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', PageHomeController::class)->name('home');
Route::get('/{slug}', [PageContentController::class, 'show'])->name('page.content.show');
