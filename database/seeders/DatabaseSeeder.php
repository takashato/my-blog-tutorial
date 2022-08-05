<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('123456test'),
        ]);

        foreach (range(1, 10) as $i) {
            $title = fake()->sentence();
            $post = Post::make([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => fake()->realText(),
            ]);
            $post->user()->associate($user);
            $post->save();
        }
    }
}
