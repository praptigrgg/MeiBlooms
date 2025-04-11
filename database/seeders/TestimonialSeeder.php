<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Emma Green',
            'designation' => 'Regular Customer',
            'message' => 'Beautiful bouquets and fast delivery! Will order again.',
            'image' => 'testimonials/emma.jpg'
        ]);
    }

}
