<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class PageContent extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasRevisions, HasPosition;

    protected $fillable = [
        'title',
        'meta_title',
        'meta_description',
        'published',
        'position',
    ];

    public $translatedAttributes = [
        'title',
        'meta_title',
        'meta_description',
        'active',
    ];

    public $slugAttributes = [
        'title',
    ];

    public array $publicAttributes = [
        'title',
        'meta_title',
        'meta_description',
    ];
}
