<?php

namespace Database\Seeders;

use App\Models\StatusCategory;
use App\Models\Task;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = ['pending', 'active', 'done'];

        foreach($categories as $category) {
            StatusCategory::factory()->create([
                'title' => $category
            ]);
        }

        Task::factory(10)->create();
    }
}
