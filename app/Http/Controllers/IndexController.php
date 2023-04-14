<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class IndexController extends Controller
{
    public function __invoke(): InertiaResponse
    {
        return Inertia::render('Index');
    }
}
