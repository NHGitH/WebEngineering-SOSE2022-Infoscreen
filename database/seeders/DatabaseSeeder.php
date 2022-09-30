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
use App\Models\News;
use App\Models\Lesson;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        News::factory(5)->create();
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
        User::factory(5)->create();
    }
}
