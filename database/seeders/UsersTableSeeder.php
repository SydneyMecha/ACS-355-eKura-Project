<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sydney Mecha',
            'email' => 'sydneymecha3@gmaail.com',
            'password' => bcrypt('Sydrick_254'),
        ]);
    }
}

// the command to restore the above data

//php artisan db:seed --class=UsersTableSeeder
