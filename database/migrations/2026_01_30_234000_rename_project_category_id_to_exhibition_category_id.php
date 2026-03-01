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
        if (Schema::hasTable('exhibitions')) {
            if (Schema::hasColumn('exhibitions', 'project_category_id')) {
                // Rename project_category_id to exhibition_category_id
                DB::statement("ALTER TABLE exhibitions CHANGE project_category_id exhibition_category_id BIGINT UNSIGNED NULL");
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('exhibitions')) {
            if (Schema::hasColumn('exhibitions', 'exhibition_category_id')) {
                DB::statement("ALTER TABLE exhibitions CHANGE exhibition_category_id project_category_id BIGINT UNSIGNED NULL");
            }
        }
    }
};
