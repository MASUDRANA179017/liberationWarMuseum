<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('projects') && !Schema::hasTable('social_posts')) {
            Schema::rename('projects', 'social_posts');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('social_posts') && !Schema::hasTable('projects')) {
            Schema::rename('social_posts', 'projects');
        }
    }
};
