<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blogs;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blogs::factory(15)->create();
    }
}
