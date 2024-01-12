<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\Faq;


class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqCategory::create([
            'name' => 'General',
            'slug' => 'general',

        ]);

        FaqCategory::create([
            'name' => 'Account Information',
            'slug' => 'account-information',
        ]);

    }
}
