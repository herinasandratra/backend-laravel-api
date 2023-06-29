<?php

namespace Database\Seeders;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\CategoryArticles;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->createCategory();
        $articles = Articles::all();
        CategoryArticles::truncate();
        foreach ($articles as $article) {
            # code...
            $this->createCategoryArticle($article->id);
        }
    }

    private function createCategoryArticle(int $article_id)
    {
        $categoriesId = Categories::pluck('id')->toArray();
        $maxVal = rand(2,count($categoriesId));
        for ($i =0;$i<$maxVal;$i++) {
            # code...
            CategoryArticles::query()->firstOrCreate([
                'article_id' => $article_id,
                'category_id' => max(1,array_rand($categoriesId))
            ]);
            echo "Category for article ".$article_id." was created.".PHP_EOL;
        }
    }
    private function createCategory()
    {
        $categories = [
            [
                'slug' => 'politics',
                'name' => 'Politique',
            ],
            [
                'slug' => 'economics',
                'name' => 'Économie',
            ],
            [
                'slug' => 'fashion',
                'name' => 'Mode',
            ],
            [
                'slug' => 'technology',
                'name' => 'Technologie',
            ],
            [
                'slug' => 'travel',
                'name' => 'Voyage',
            ],
            [
                'slug' => 'health',
                'name' => 'Santé',
            ],
            [
                'slug' => 'entertainment',
                'name' => 'Divertissement',
            ],
            [
                'slug' => 'sports',
                'name' => 'Sports',
            ],
            [
                'slug' => 'culture',
                'name' => 'Culture',
            ],
            [
                'slug' => 'science',
                'name' => 'Science',
            ],
        ];
        Categories::truncate();
        foreach ($categories as $category) {
            # code...
            Categories::query()->create($category);
            echo $category['name']." category was created.".PHP_EOL;
        } 
    }
}
