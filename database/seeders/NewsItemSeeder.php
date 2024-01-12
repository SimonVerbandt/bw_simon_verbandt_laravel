<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsItem;
use App\Models\User;

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
            'slug' => 1,
        ])->author()->save(Admin::find(1));
    }
}
