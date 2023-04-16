<?php

namespace App\Http\Controllers\App;

use App\Models\PageContent;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class PageContentController extends Controller
{
    public function show(string $slug): InertiaResponse
    {
        $item = PageContent::publishedInListings()
            ->forSlug($slug)
            ->first();

        abort_if($item === null, Response::HTTP_NOT_FOUND);

        return Inertia::render('Page/Content', [
            'item' => $item,
        ]);
    }
}
