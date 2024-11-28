<?php

namespace Database\Seeders;

use App\Models\Ballot;
use App\Models\Election;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Election::factory()
            ->count(10)
            ->withBallotsAndCandidates(5, 3)
            ->create();
    }
}
