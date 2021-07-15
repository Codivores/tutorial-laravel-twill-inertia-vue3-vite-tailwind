<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        return Inertia::render('Index', [
            'darkMode' => (bool)random_int(0, 1),
        ]);
    }
}
