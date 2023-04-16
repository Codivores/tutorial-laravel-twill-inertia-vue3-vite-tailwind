<?php

namespace App\Http\Controllers\App;

use App\Models\PageContent;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class PageContentController extends Controller
{
    public function show(string $slug): InertiaResponse
    {
        $item = Cache::rememberForever(
            'page.content.' . app()->getLocale() . '.' . $slug,
            function () use ($slug) {
                $item = PageContent::publishedInListings()
                    ->forSlug($slug)
                    ->first();
                if ($item !== null) {
                    $item->load('translations', 'medias', 'blocks');
                }
                return $item;
            }
        );

        abort_if($item === null, Response::HTTP_NOT_FOUND);

        return Inertia::render('Page/Content', [
            'item' => $item->only($item->publicAttributes),
        ]);
    }
}
