<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = Category::pluck('id');
        
        Article::factory()
        ->count(20)
        ->make()
        ->each(function ($article) use ($categoryIds) {
            $article->category_id = $categoryIds->random();
            $article->user_id = User::inRandomOrder()->first()->id;
            $article->save();
        });
    }
}