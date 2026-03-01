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
        Schema::table('social_posts', function (Blueprint $table) {
            if (Schema::hasColumn('social_posts', 'title')) {
                DB::statement("ALTER TABLE social_posts CHANGE title exhibition_title VARCHAR(255) NOT NULL");
            }
            if (Schema::hasColumn('social_posts', 'location')) {
                DB::statement("ALTER TABLE social_posts CHANGE location director_name VARCHAR(255) NULL DEFAULT NULL");
            }

            if (!Schema::hasColumn('social_posts', 'synopsis')) {
                $table->text('synopsis')->nullable();
            }
            if (!Schema::hasColumn('social_posts', 'video')) {
                $table->string('video')->nullable();
            }

            // Drop Foreign Key for project_category_id if it exists
            if (Schema::hasColumn('social_posts', 'project_category_id')) {
                $fk = DB::select("SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'social_posts' AND COLUMN_NAME = 'project_category_id' AND REFERENCED_TABLE_NAME IS NOT NULL LIMIT 1");
                if (!empty($fk)) {
                    $table->dropForeign($fk[0]->CONSTRAINT_NAME);
                }
            }

            $columnsToDrop = [
                'project_number',
                'project_category_id',
                'description',
                'client',
                'chemical',
                'product',
                'color',
                'area',
                'project_date',
                'project_end_date'
            ];

            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('social_posts', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('social_posts', function (Blueprint $table) {
            if (Schema::hasColumn('social_posts', 'exhibition_title')) {
                DB::statement("ALTER TABLE social_posts CHANGE exhibition_title title VARCHAR(255) NOT NULL");
            }
            if (Schema::hasColumn('social_posts', 'director_name')) {
                DB::statement("ALTER TABLE social_posts CHANGE director_name location VARCHAR(255) NULL DEFAULT NULL");
            }

            if (Schema::hasColumn('social_posts', 'synopsis')) {
                $table->dropColumn('synopsis');
            }
            if (Schema::hasColumn('social_posts', 'video')) {
                $table->dropColumn('video');
            }
        });
    }
};
