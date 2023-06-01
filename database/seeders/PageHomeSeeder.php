<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\PageHomeRepository;
use App\Models\PageHome;

class PageHomeSeeder extends Seeder
{
    /**
     * Create the database record for this singleton module.
     *
     * @return void
     */
    public function run()
    {
        if (PageHome::count() > 0) {
            return;
        }

        app(PageHomeRepository::class)->create([
            'title' => [
                'en' => 'PageHome',
                // add other languages here
            ],
            'description' => [
                'en' => '',
                // add other languages here
            ],
            'published' => false,
        ]);
    }
}
