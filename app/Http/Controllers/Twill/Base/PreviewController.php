<?php

namespace App\Http\Controllers\Twill\Base;

use A17\Twill\Http\Controllers\Admin\Controller;
use App\Http\Controllers\Twill\Base\ModuleController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class PreviewController extends ModuleController
{
    public function __construct(Application $app, Request $request)
    {
        Controller::__construct($app, $request);
        $this->app = $app;
        $this->request = $request;
    }

    public function __invoke(Request $request): InertiaResponse
    {
        abort_if(!$request->has('sessionKey'), Response::HTTP_NOT_FOUND);

        $sessionKey = $request->input('sessionKey');

        abort_if(!$request->session()->has($sessionKey), Response::HTTP_NOT_FOUND);

        $input = $request->session()->get($sessionKey);

        abort_if(!isset($input['module']) || !isset($input['itemPreview']), Response::HTTP_NOT_FOUND);

        $item = $input['itemPreview'];

        $props = $input['props'] ?? [];
        if (!isset($props['locale'])) {
            $props['locale'] = app()->getLocale();
        }

        $page = $input['page'] ?? ucfirst($input['module']) . '/Item';

        return match ($input['module']) {
            default => Inertia::render($page, ['item' => $item] + $props),
        };
    }
}
