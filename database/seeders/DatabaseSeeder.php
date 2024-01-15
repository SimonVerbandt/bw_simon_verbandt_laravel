<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ContactForm;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ArticleSeeder::class,
            AirlineSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            FaqCategorySeeder::class,
            FaqSeeder::class,
            NewsItemSeeder::class,
            ContactFormSeeder::class,
            ContactFormResponseSeeder::class,
        ]);

    }
}
