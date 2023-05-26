<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogPost::factory()
            ->count(10)
            ->hasBlogMedia(2)
            ->create();
        
        BlogPost::factory()
        ->count(10)
        ->hasBlogMedia(1)
        ->create();
    }
}
