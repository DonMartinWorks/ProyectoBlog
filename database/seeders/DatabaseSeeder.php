<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creacion de la carpeta (posts) si no existe
        Storage::makeDirectory('public/posts');

        $this->call(UserSeeder::class);

        \App\Models\Category::factory(4)->create();

        \App\Models\Tag::factory(8)->create();

        $this->call(PostSeeder::class);
    }
}
