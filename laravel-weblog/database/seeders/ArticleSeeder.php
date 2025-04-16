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

        $imagePath = storage_path('app/public/article_images');
        $files = collect(scandir($imagePath))->filter(function($file) {
            return !in_array($file, ['.', '..']) && preg_match('/\.(jpg|jpeg|png)$/i', $file);
        });
        
        Article::factory()
        ->count(20)
        ->make()
        ->each(function ($article) use ($categoryIds, $files) {
            $article->category_id = $categoryIds->random();
            $article->user_id = User::inRandomOrder()->first()->id;
            $randomImage = $files->random();
            $article->image = $randomImage;

            $article->save();
        });
    }
}