<?php

namespace Database\Seeders;

use App\Models\Authors;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $authors = [
            [
                'name' => 'Pierre Menès'
            ],
            [
                'name' => 'Daniel Riolo'
            ],
            [
                'name' => 'Mohamed Bouhafsi'
            ],
            [
                'name' => 'Marina Lorenzo'
            ],
            [
                'name' => 'Jean-Pierre Papin'
            ],
            [
                'name' => 'Élise Lucet'
            ],
            [
                'name' => 'Gilles Verdez'
            ],
            [
                'name' => 'Estelle Denis'
            ],
            [
                'name' => 'Didier Roustan'
            ],
            [
                'name' => 'Nathalie Iannetta'
            ]
        ];
        Authors::truncate();
        foreach ($authors as  $author) {
            # code...
            Authors::query()->create($author);
            echo $author['name']." was created".PHP_EOL;
        }
    }
}
