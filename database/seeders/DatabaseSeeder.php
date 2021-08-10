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
        $authors = \App\Models\User::factory(10)->create();
        foreach ($authors as $author){
            \App\Models\Post::factory(10)->create([
                'authorId' => $author->id
            ]);
        }
    }
}
