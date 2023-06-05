<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = 'Admin';
        $role2 = 'Blogger';


        User::create([
            'name' => 'Usuario',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'remember_token' => Str::random(10),
        ])->assignRole($role1);

        User::create([
            'name' => 'Usuario',
            'last_name' => 'Blogger',
            'email' => 'blog@blog.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'remember_token' => Str::random(10),
        ])->assignRole($role2);

        User::factory(22)->create();

        // for ($i = 1; $i < 11; $i++) {
        //     User::factory()->create()->assignRole('Blogger');
        // }
    }
}
