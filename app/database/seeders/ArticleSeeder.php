<?php

namespace Database\Seeders;

use App\Models\Articles;
use App\Models\Authors;
use App\Models\InfoArticles;
use App\Models\Sources;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $titles = [
            "La Russie devient la première puissance économique mondiale",
            "Les États-Unis deviennent le maître du monde",
            "La technologie révolutionne l'industrie automobile",
            "La lutte contre le changement climatique s'intensifie",
            "Les avancées médicales ouvrent de nouvelles perspectives de guérison",
            "Le tourisme spatial devient accessible au grand public",
            "L'intelligence artificielle transforme notre quotidien",
            "Les énergies renouvelables dominent le marché de l'énergie",
            "Les villes intelligentes révolutionnent l'urbanisme",
            "Le secteur de la finance adopte la blockchain"
        ];
        
        $articles = [];
        
        for ($i = 1; $i <= 100; $i++) {
            $titleIndex = ($i - 1) % count($titles);
            $article = [
                'title' => $titles[$titleIndex]."-".$i.".".$titleIndex,
                'source_id' => $this->randSource(),
                'author_id' => $this->randAuthor(),
            ];
            $articles[] = $article;
        }
        Articles::truncate();
        InfoArticles::truncate();
        foreach ($articles as $article) {
            $article = Articles::query()->create($article);
            $article->update(['created_at' =>$this->randomDate()]);
            $this->createInfoArticle($article->id); //phpstanignore
            echo $article['title']." was created".PHP_EOL;
        }

    }

    private function randSource()
    {
        $existingSourceIds = Sources::pluck('id')->toArray();

        $randomSourceId = $existingSourceIds[array_rand($existingSourceIds)];
        return $randomSourceId;
    }

    private function randAuthor()
    {
        $existingSourceIds = Authors::pluck('id')->toArray();

        $randomSourceId = $existingSourceIds[array_rand($existingSourceIds)];
        return $randomSourceId;
    }

    private function createInfoArticle(int $article_id)
    {
        $descriptions = [
            [
                'lang' => 'deu',
                'description' => $article_id."Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll Wörter nahm und diese durcheinander war",
                'article_id' => $article_id,
            ],
            [
                'lang' => 'fr',
                'description' => $article_id."Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morce11111a",
                'article_id' => $article_id,

            ],
            [
                'lang' => 'en',
                'article_id' => $article_id,
                'description' => $article_id."Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            ],
            [
                'lang' => 'esp',
                'article_id' => $article_id,
                'description' => $article_id."Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) descon",
            ],
        ];
        $index = array_rand($descriptions);
        $des1 = $descriptions[$index];
        InfoArticles::query()->create($des1);
        unset($descriptions[$index]);
        $des1 = $descriptions[array_rand($descriptions)];
        InfoArticles::query()->create($des1);
    }
    private function randomDate()
    {
        $startDate = Carbon::parse('2021-01-01');
        $endDate = Carbon::now();

        $randomDate = Carbon::createFromTimestamp(
            mt_rand($startDate->timestamp, $endDate->timestamp)
        );

        return $randomDate;
    }
}
