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
        Schema::table('services', function (Blueprint $table) {
            // Rename columns using raw SQL for better compatibility
            if (Schema::hasColumn('services', 'name')) {
                DB::statement("ALTER TABLE services CHANGE name film_name VARCHAR(255) NOT NULL");
            }
            if (Schema::hasColumn('services', 'description')) {
                DB::statement("ALTER TABLE services CHANGE description synopsis LONGTEXT NULL");
            }

            // Add new columns
            if (!Schema::hasColumn('services', 'director_name')) {
                $table->string('director_name')->nullable();
            }
            if (!Schema::hasColumn('services', 'video')) {
                $table->string('video')->nullable();
            }

            // Drop unused columns
            $columnsToDrop = ['text_before_price', 'price', 'text_after_price'];
            foreach ($columnsToDrop as $col) {
                if (Schema::hasColumn('services', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Restore renamed columns
            if (Schema::hasColumn('services', 'film_name')) {
                DB::statement("ALTER TABLE services CHANGE film_name name VARCHAR(255) NOT NULL");
            }
            if (Schema::hasColumn('services', 'synopsis')) {
                DB::statement("ALTER TABLE services CHANGE synopsis description LONGTEXT NULL");
            }

            // Drop added columns
            if (Schema::hasColumn('services', 'director_name')) {
                $table->dropColumn('director_name');
            }
            if (Schema::hasColumn('services', 'video')) {
                $table->dropColumn('video');
            }

            // Restore dropped columns
            if (!Schema::hasColumn('services', 'text_before_price')) {
                $table->string('text_before_price')->nullable();
            }
            if (!Schema::hasColumn('services', 'price')) {
                $table->decimal('price', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('services', 'text_after_price')) {
                $table->string('text_after_price')->nullable();
            }
        });
    }
};
