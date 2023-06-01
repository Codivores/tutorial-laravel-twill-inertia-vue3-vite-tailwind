<?php

use A17\Twill\Facades\TwillRoutes;
use App\Http\Controllers\Twill\Base\PreviewController;
use Illuminate\Support\Facades\Route;

Route::get('preview', PreviewController::class)->name('preview');

TwillRoutes::singleton('pageHome');
Route::group(['prefix' => 'content'], function () {
    TwillRoutes::module('pageContents');
});
