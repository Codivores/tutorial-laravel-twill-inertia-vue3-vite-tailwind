<?php

use A17\Twill\Facades\TwillRoutes;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'content'], function () {
    TwillRoutes::module('pageContents');
});
