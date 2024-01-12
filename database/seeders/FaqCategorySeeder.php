<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\User;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::find(1);
        FaqCategory::create([
            'name' => 'General',
            'slug' => 'general',
            'admin_id' => $admin->id,
        ]);

        FaqCategory::create([
            'name' => 'Account Information',
            'slug' => 'account-information',
            'admin_id' => $admin->id,
        ]);

    }
}
