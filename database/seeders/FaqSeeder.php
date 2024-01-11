<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = FaqCategory::where('name', 'General')->first();
        $category2 = FaqCategory::where('name', 'Account Information')->first();
        Faq::create([
            'question' => 'Why use The Aviation Times?',
            'answer' => 'The Aviation Times is a news website that provides the latest aviation news. We have created this website for the aviation fanatics out there. We hope you enjoy our website!',
            'category' => 'General',
        ])->faqCategory()->associate($category1)->save();

        Faq::create([
            'question' => 'How do I create an account?',
            'answer' => 'You can create an account by clicking on the register button in the top right corner of the website. You will be redirected to a page where you can create an account.',
            'category' => 'Account Information',
        ])->faqCategory()->associate($category2)->save();

        Faq::create([
            'question' => 'How do I login?',
            'answer' => 'You can login by clicking on the login button in the top right corner of the website. You will be redirected to a page where you can login.',
            'category' => 'Account Information',
        ])->faqCategory()->associate($category2)->save();

        Faq::create([
            'question' => 'How do I edit my information?',
            'answer' => 'You can change your password by clicking on the profile button in the top right corner of the website. You will be redirected to a page where you can change your password.',
            'category' => 'Account Information',
        ])->faqCategory()->associate($category2)->save();

        Faq::create([
            'question' => 'Why should I create an account?',
            'answer' => 'When you are logged in, you can see more information on various topics within the aviation industry. As a regular visitor, you are only inclined to view the articles. We are planning on adding features, so stay tuned!',
            'category' => 'General',
        ])->faqCategory()->associate($category1)->save();
    }
}
