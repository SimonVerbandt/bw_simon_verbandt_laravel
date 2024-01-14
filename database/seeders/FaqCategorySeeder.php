<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::find(1);
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
