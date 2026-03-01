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
        if (Schema::hasTable('services')) {
            Schema::rename('services', 'films');
        }

        if (Schema::hasTable('service_images')) {
            Schema::rename('service_images', 'film_images');

            Schema::table('film_images', function (Blueprint $table) {
                // Drop foreign key first
                // Standard naming: table_column_foreign
                // service_images_service_id_foreign
                $table->dropForeign(['service_id']);
            });

            // Rename column using raw SQL for compatibility
            // Assuming service_id is BIGINT(20) UNSIGNED
            DB::statement("ALTER TABLE film_images CHANGE service_id film_id BIGINT UNSIGNED NOT NULL");

            Schema::table('film_images', function (Blueprint $table) {
                // Add new foreign key
                $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('film_images')) {
            Schema::table('film_images', function (Blueprint $table) {
                $table->dropForeign(['film_id']);
            });

            DB::statement("ALTER TABLE film_images CHANGE film_id service_id BIGINT UNSIGNED NOT NULL");

            Schema::table('film_images', function (Blueprint $table) {
                // Re-add old foreign key pointing to services (which will be renamed back below)
                // We need to wait until films is renamed back to services, or just reference 'films' if it's not renamed yet.
                // But in down(), we usually rename table back at the end.
            });

            Schema::rename('film_images', 'service_images');
        }

        if (Schema::hasTable('films')) {
            Schema::rename('films', 'services');
        }

        if (Schema::hasTable('service_images')) {
            Schema::table('service_images', function (Blueprint $table) {
                $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            });
        }
    }
};
