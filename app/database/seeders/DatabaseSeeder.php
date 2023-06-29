<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthorSeeder::class);
        $this->call(SourceSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
        
        // \App\Models\User::factory(10)->create();
    }
}
