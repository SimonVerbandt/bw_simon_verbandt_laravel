<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsItem;


class NewsItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsItem::create([
            'title' => 'News Item 1',
            'image' => 'https://picsum.photos/200/300',
            'content' => 'This is the content for news item 1',
            'published_at' => '2021-01-01',
            'author_id' => 1,
            'slug' => 'news-item-1',
        ])->author()->save(Admin::find(1));

        NewsItem::create([
            'title' => 'News Item 2',
            'image' => 'https://picsum.photos/200/300',
            'content' => 'This is the content for news item 2',
            'published_at' => '2021-01-02',
            'author_id' => 1,
            'slug' => 'news-item-2',
        ])->author()->save(Admin::find(1));

        NewsItem::create([
            'title' => 'News Item 3',
            'image' => 'https://picsum.photos/200/300',
            'content' => 'This is the content for news item 3',
            'published_at' => '2021-01-03',
            'author_id' => 1,
            'slug' => 'news-item-3',
        ])->author()->save(Admin::find(1));
    }
}
