<?php

namespace Database\Seeders;

use App\Models\Articles;
use App\Models\TagArticles;
use App\Models\Tags;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createTags();
        $articles = Articles::all();
        TagArticles::truncate();
        foreach ($articles as $article) {
            # code...
            $this->createTagArticle($article->id);

        }
    }

    private function createTagArticle(int $article_id)
    {
        $tagIds = Tags::pluck('id')->toArray();
        $maxVal = rand(2,count($tagIds));
        for ($i =0;$i<$maxVal;$i++) {
            # code...
            TagArticles::query()->firstOrCreate([
                'article_id' => $article_id,
                'tag_id' => max(1,array_rand($tagIds))
            ]);
            echo "Tags for article ".$article_id." was created.".PHP_EOL;
        }
    }
    private function createTags()
    {
        Tags::truncate();
        $tags = [
            [
                'slug' => 'world-news',
                'name' => 'World News',
            ],
            [
                'slug' => 'international-affairs',
                'name' => 'International Affairs',
            ],
            [
                'slug' => 'global-events',
                'name' => 'Global Events',
            ],
            [
                'slug' => 'documentary-films',
                'name' => 'Documentary Films',
            ],
            [
                'slug' => 'current-affairs',
                'name' => 'Current Affairs',
            ],
            [
                'slug' => 'global-issues',
                'name' => 'Global Issues',
            ],
            [
                'slug' => 'investigative-journalism',
                'name' => 'Investigative Journalism',
            ],
            [
                'slug' => 'world-politics',
                'name' => 'World Politics',
            ],
            [
                'slug' => 'social-documentaries',
                'name' => 'Social Documentaries',
            ],
            [
                'slug' => 'global-culture',
                'name' => 'Global Culture',
            ]
        ];
        foreach ($tags as $tag) {
            # code...
            Tags::query()->create($tag);
            echo $tag['name']." tag was created.".PHP_EOL;
        }        
    }
}
