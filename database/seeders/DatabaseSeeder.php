<?php
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\TestimonialSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Optional test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call your custom seeders
        $this->call([
            CategorySeeder::class,
            TestimonialSeeder::class,
        
        ]);
    }
}
