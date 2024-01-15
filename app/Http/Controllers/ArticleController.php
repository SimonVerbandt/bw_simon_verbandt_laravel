<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public static function fetch($airline_name){
        $api_key = 'ea7bfa88d7abf6c78930afbbdd72a8ed';
        if($airline_name == null){
            $fetch = Http::get('https://gnews.io/api/v4/top-headlines', [
                'lang' => 'en',
                'q' => 'airline AND (aviation OR airlines OR flights OR travel)',
                'apikey' => $api_key,
            ] );
        }
        else{
            $fetch = Http::get('https://gnews.io/api/v4/top-headlines', [
                'lang' => 'en',
                'q' => $airline_name,
                'apikey' => $api_key,
            ] );
        }
        return json_decode($fetch);
    }
}
