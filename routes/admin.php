<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'content'], function () {
    Route::module('pages');
});
