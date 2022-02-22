<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // On va faire un appel sur l'API de The Movie DB
        $response = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=ebc0a4ad59da5f80113ec7d1142c72a7&language=fr');
        $genres = $response->json()['genres'];

        foreach ($genres as $genre) {
            Category::factory()->create(['name' => $genre['name']]);
        }

        // Category::factory(30)->create();
        
        // .......
        
        Movie::factory(30)->create();
    }
}
