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
        $imagePath = storage_path('app/public/article_images');
        $files = collect(scandir($imagePath))->filter(function($file) {
            return !in_array($file, ['.', '..']) && preg_match('/\.(jpg|jpeg|png)$/i', $file);
        });
        
        Article::factory()
        ->count(20)
        ->make()
        ->each(function ($article) use ($categoryIds, $files) {
            $randomImage = $files->random();
            $article->image = 'article_images/' . $randomImage;

            $article->save();
        });
    }
}
