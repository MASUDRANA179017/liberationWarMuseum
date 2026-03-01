<?php

namespace Database\Seeders;

use App\Models\TestimonialMain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialMainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TestimonialMain::create([
            'title'       => 'They Were Happy With Our Service',
            'description' => "Our clients' satisfaction is our top priority. We are proud to have partnered with leading organizations across various industries, delivering high-quality flooring and waterproofing solutions that stand the test of time.",
            'sub_title' => 'Our Testimonial',
            'status'      => true,
        ]);
    }
}
