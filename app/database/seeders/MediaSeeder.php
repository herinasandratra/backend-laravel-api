<?php

namespace Database\Seeders;

use App\Models\Articles;
use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Media::truncate();
        $articles = Articles::all();
        foreach ($articles as $article) {
            # code...
            $this->createMedia($article->id);
        }
    }
    private function createMedia($article_id)
    {
        $url = env('APP_URL','http://localhost:8000');
        $medias =[
            [
                'url' => $url.'/test.png',
                'type' => 'image',
                'path' => '',
                'article_id' => $article_id
            ],
            [
                'url' => $url.'/test1.png',
                'type' => 'image',
                'path' => '',
                'article_id' => $article_id
            ],
        ];
        foreach ($medias as $media) {
            # code...
            Media::query()->create($media);
            echo "medias was create for article number: ".$article_id.PHP_EOL;
        }
    }
}
