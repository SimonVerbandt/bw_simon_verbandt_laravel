<?php

namespace Database\Seeders;

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = ArticleController::fetch(null);
        if($articles && isset($articles -> articles)){
            foreach($articles -> articles as $article)
            {
                $post = Article::create([
                    'title' => $article -> title,
                    'image' => $article -> image,
                    'abstract' => $article -> description,
                    'url' => $article -> url,
                    'published_at' => Carbon::parse($article->publishedAt),
                    'created_at' => Carbon::parse($article -> publishedAt), //ChatGPT -> Carbon parse
                ]);
            }
        }else{
            throw new \mysqli_sql_exception('No top headlines for today');
        }
    }
}
