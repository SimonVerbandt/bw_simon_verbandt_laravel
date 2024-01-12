<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactFormResponse;
use App\Models\User;
use App\Models\ContactForm;

class ContactFormResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::find(1);
        $user2 = User::find(2);
        $form1 = ContactForm::find(1);
        $form2 = ContactForm::find(2);
        ContactFormResponse::create([
            'subject' => 'Reply to Test message',
            'content' => 'This is a test message',
            'admin_id' => $user1->id,
            'contact_form_id' => $form1->id,
        ]);

        ContactFormResponse::create([
            'subject' => 'Reply to Test message 2',
            'content' => 'This is a test message 2',
            'admin_id' => $user2->id,
            'contact_form_id' => $form2->id,
        ]);
    }
}
