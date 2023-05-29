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
        // Eliminacion posts, para no tener imaganes de mas
        Storage::deleteDirectory('public/posts');

        // Creacion de la carpeta (posts) si no existe
        Storage::makeDirectory('public/posts');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        \App\Models\Category::factory(4)->create();

        \App\Models\Tag::factory(12)->create();

        $this->call(PostSeeder::class);
    }
}
