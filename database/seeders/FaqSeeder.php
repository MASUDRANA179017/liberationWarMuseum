<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::insert([
            [
                'question' => 'What is this platform about?',
                'answer' => 'This platform helps users manage projects, tasks, and communication effectively.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How can I create a new project?',
                'answer' => 'Go to the projects section, click on "Add New Project", fill in the details, and save.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
