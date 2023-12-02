<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index){

            $post = new Post;
            $post->title = $faker -> sentence;
            $post->body = $faker -> text;
            $post->save();
        }
    }
}
