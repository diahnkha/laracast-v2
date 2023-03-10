<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory()->create();

        Post::factory()->create();

        // $user = User::factory()->create([
        //     'name' => 'Diah Nur Khasanah'
        // ]);

        // Post::factory(10)->create([
        //     'user_id' => $user->id
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
