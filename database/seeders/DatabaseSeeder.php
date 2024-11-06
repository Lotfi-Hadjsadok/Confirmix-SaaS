<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\Product;
use App\Models\User;
use Database\Factories\OrderFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Employee::factory()->create();
        Employer::factory()->create();
        Product::factory()->count(5)->create();
        OrderFactory::new()->count(50)->create();
    }
}
