<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Paswoord!321'),
            'birthday' => '1999-01-01',
            'isAdmin' => true,
        ]);
    }
}
