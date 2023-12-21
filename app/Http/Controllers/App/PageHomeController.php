<?php

namespace App\Http\Controllers\App;

use App\Models\PageHome;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class PageHomeController extends Controller
{
    public function __invoke(): InertiaResponse
    {
        $locale = app()->getLocale();

        $item = Cache::rememberForever(
            'page.home.' . $locale,
            function () {
                $item = PageHome::first();

                if ($item !== null) {
                    $item->load('translations', 'blocks');
                    $item->computeBlocks();
                }

                return $item;
            }
        );

        abort_if($item === null, Response::HTTP_NOT_FOUND);

        return Inertia::render('Page/Home', [
            'item' => $item->only($item->publicAttributes),
            'locale' => $locale,
        ]);
    }
}
