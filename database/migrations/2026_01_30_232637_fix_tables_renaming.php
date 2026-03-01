<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Rename project_categories to exhibition_categories if it exists
        if (Schema::hasTable('project_categories') && !Schema::hasTable('exhibition_categories')) {
            Schema::rename('project_categories', 'exhibition_categories');
        }

        // Rename project_id to exhibition_id in exhibition_images table
        if (Schema::hasTable('exhibition_images')) {
            if (Schema::hasColumn('exhibition_images', 'project_id')) {
                // Use raw SQL to avoid Doctrine dependency issues and foreign key checks
                DB::statement("ALTER TABLE exhibition_images CHANGE project_id exhibition_id BIGINT UNSIGNED NOT NULL");
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse renaming
        if (Schema::hasTable('exhibition_categories') && !Schema::hasTable('project_categories')) {
            Schema::rename('exhibition_categories', 'project_categories');
        }

        if (Schema::hasTable('exhibition_images')) {
            if (Schema::hasColumn('exhibition_images', 'exhibition_id')) {
                DB::statement("ALTER TABLE exhibition_images CHANGE exhibition_id project_id BIGINT UNSIGNED NOT NULL");
            }
        }
    }
};
