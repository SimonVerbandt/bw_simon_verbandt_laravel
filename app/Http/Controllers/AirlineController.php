<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Carbon\Carbon;

class AirlineController extends Controller
{
    public function index()
    {
        return view('airline.index', [
            'airlines' => Airline::all(),
        ]);
    }

    public function show($name){

        return view('airline.show', [
            'airline' => Airline::where('name', $name)->first(),
            'articles' => $this->articles($name),
        ]);
    }

    public function articles($name){

        $articles = ArticleController::fetch($name);
        if($articles && isset($articles -> articles)){
            $posts = [];
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
                array_push($posts, $post);
            }
            return $posts;
        }else{
            return $posts = null;
        }

}
}
