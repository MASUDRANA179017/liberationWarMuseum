<?php

namespace Database\Seeders;

use App\Models\FaqMain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqMainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqMain::create([
            'title'       => 'Frequently Asked Questions',
            'description' => "Charifund is the ultimate guide to understanding the basic doctrines of the Church dive deep into the core beliefs and teachings that shape the Church's foundation learn about the significance of key doctrines such as the Trinity, salvation, and the sacraments explore how these doctrines impact ",
            'button_text' => 'Contact Us',
            'button_url'  => 'https//contact',
            'status'      => true,
        ]);
    }
}
