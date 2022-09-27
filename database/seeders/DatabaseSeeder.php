<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Post;
use App\Models\Room;
use App\Models\User;
use App\Models\Building;
use App\Models\Course;
use App\Models\Professor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(10)->create();
        Module::factory(10)->create();
        Room::factory(10)->create();
        Building::factory(5)->create();
        Course::factory(7)->create();
        Professor::factory(20)->create();
        User::factory(1)->create([
            'name' => 'admin',
            'username' => 'admin',
            'role' => 'admin',
            'password' => 'admin123',
        ]);
        User::factory(40)->create();
    }
}
