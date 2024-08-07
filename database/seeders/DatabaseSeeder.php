<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blogs;
use App\Models\Kahim;
use App\Models\Proker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();
        Blogs::factory(10)->create();
        Kahim::factory(1)->create();
        Proker::factory(3)->create();
    }
}
