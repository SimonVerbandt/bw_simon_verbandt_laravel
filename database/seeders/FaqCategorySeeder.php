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
        $general = FaqCategory::create([
            'name' => 'General',

        ]);

        $account = FaqCategory::create([
            'name' => 'Account Information',
        ]);

        $this->getFaqs($general, 'General');
        $this->getFaqs($account, 'Account Information');

    }

    private function getFaqs(FaqCategory $category, string $name)
    {
        $faqs = Faq::where('category', $name)->get();
        foreach ($faqs as $faq) {
            $category->faqs()->save($faq);
        }
    }
}
