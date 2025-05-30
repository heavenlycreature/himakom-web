<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\User;
use App\Models\Blogs;
use App\Models\Journal;
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
        User::factory(1)->create();
        Blogs::factory(15)->create();
        Kahim::factory(1)->create();
        Proker::factory(3)->create();
        Journal::factory(14)->create();
    }
}
