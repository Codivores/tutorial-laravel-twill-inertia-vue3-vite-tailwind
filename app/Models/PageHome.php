<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasRevisions;
use App\Models\Base\Model;

class PageHome extends Model
{
    use HasBlocks, HasTranslation, HasRevisions;

    protected $fillable = [
        'title',
        'meta_title',
        'meta_description',
    ];

    public $translatedAttributes = [
        'title',
        'meta_title',
        'meta_description',
        'active',
    ];

    public array $publicAttributes = [
        'title',
        'meta_title',
        'meta_description',
        'blocks',
    ];
}
