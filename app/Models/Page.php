<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Page extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasRevisions, HasPosition;

    protected $fillable = [
        'published',
        'title',
        'meta_title',
        'meta_description',
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
}
