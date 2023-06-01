<?php

namespace App\Http\Controllers\Twill\Traits;

use Illuminate\Support\Str;

trait HasPreview
{
    protected function previewForInertia($item, array $config): array
    {
        if (in_array('blocks', $config)) {
            $item->computeBlocks();
        }

        if (isset($config['medias']) && is_array($config['medias'])) {
            foreach ($config['medias'] as $role) {
                $item->computeMedias($role);
            }
        }

        $sessionKey = 'adminPreview_' . Str::random(40);

        request()->session()->flash($sessionKey, [
            'module' => Str::singular($this->moduleName),
            'page' => $config['page'] ?? null,
            'itemPreview' => $item,
            'props' => $config['props'] ?? [],
        ]);

        return [
            'route' => route('twill.preview'),
            'sessionKey' => $sessionKey,
        ];
    }
}
