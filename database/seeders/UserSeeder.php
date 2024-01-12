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
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Paswoord!321'),
            'birthday' => '1999-01-01',
            'isAdmin' => true,
        ]);

        User::create([
            'name' => 'simon',
            'email' => 'simon.verbandt@student.ehb.be',
            'password' => bcrypt('Paswoord!321'),
            'birthday' => '1999-01-01',
            'isAdmin' => false,
        ]);

        User::create([
            'name' => 'prof',
            'email' => 'prof@ehb.be',
            'password' => bcrypt('Prof!123'),
            'birthday' => '1999-01-01',
            'isAdmin' => false,
        ]);
    }

}
