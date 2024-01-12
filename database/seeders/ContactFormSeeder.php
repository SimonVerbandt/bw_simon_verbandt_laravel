<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactForm;
use App\Models\User;

class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::find(1);
        $user2 = User::find(2);
        ContactForm::create([
            'content' => 'This is a test message',
            'author_id' => $user1->id,
        ]);

        ContactForm::create([
            'content' => 'This is a test message 2',
            'author_id' => $user2->id,
        ]);
    }
}
