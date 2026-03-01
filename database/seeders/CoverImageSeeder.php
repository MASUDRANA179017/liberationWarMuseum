<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CoverImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CoverImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        CoverImage::create([
            'page_name' => 'about',
            'cover_image' => null,
            'status' => true,
        ]);


        CoverImage::create([
            'page_name' => 'service',
            'cover_image' => null,
            'status' => true,
        ]);

        CoverImage::create([
            'page_name' => 'product',
            'cover_image' => null,
            'status' => true,
        ]);

        CoverImage::create([
            'page_name' => 'project',
            'cover_image' => null,
            'status' => true,
        ]);

        CoverImage::create([
            'page_name' => "gallery",
            'cover_image' => null,
            'status' => true,
        ]);

        CoverImage::create([
            'page_name' => "news",
            'cover_image' => null,
            'status' => true,
        ]);

        CoverImage::create([
            'page_name' => "contact",
            'cover_image' => null,
            'status' => true,
        ]);
    }
}
