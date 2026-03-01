<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       About::create([
            'title'       => 'Know more about TKHRS',
            'description' => "At TKHRS, we offer reliable field services including move-out cleaning, deep cleaning, handyman work, property preservation, plumbing, and HVAC repairs.

We maintain clear communication, respect your schedule, and deliver dependable service with outstanding results. This step-by-step approach allows us to build lasting relationships with our clients and provide consistent, quality solutions for their property needs.

We maintain clear communication, respect your schedule, and deliver dependable service with outstanding results. This step-by-step approach allows us to build lasting relationships with our clients and provide consistent, quality solutions for their property needs. ",
            
        ]);
    }
}
