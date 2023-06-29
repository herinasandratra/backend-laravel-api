<?php

namespace Database\Seeders;

use App\Models\Sources;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sources = [
            [
                'slug' => 'bbc',
                'name' => 'BBC',
            ],
            [
                'slug' => 'blog',
                'name' => 'Blog',
            ],
            [
                'slug' => 'cnn',
                'name' => 'CNN',
            ],
            [
                'slug' => 'nytimes',
                'name' => 'The New York Times',
            ],
            [
                'slug' => 'reuters',
                'name' => 'Reuters',
            ],
            [
                'slug' => 'guardian',
                'name' => 'The Guardian',
            ],
            [
                'slug' => 'apnews',
                'name' => 'Associated Press',
            ],
            [
                'slug' => 'aljazeera',
                'name' => 'Al Jazeera',
            ],
            [
                'slug' => 'forbes',
                'name' => 'Forbes',
            ],
            [
                'slug' => 'washingtonpost',
                'name' => 'The Washington Post',
            ],
            [
                'slug' => 'magazine',
                'name' => 'Magazines',
            ],
        ];
        Sources::truncate();
        foreach ($sources as $source) {
            # code...
            Sources::query()->create($source);
            echo $source['name']." was created".PHP_EOL;
        }
    }
}
