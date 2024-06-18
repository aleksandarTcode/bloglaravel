<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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

        $user1 = User::factory()->create([
            'name' => 'John Doe'
        ]);

        $user2 = User::factory()->create([
            'name' => 'Jane Davids'
        ]);

        Post::factory(10)->create([
            'user_id' => $user1->id
        ]);

        Post::factory(10)->create([
            'user_id' => $user2->id
        ]);

    }
}
