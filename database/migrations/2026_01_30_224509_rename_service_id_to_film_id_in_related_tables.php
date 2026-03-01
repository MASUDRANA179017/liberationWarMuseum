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
        // 1. estimations table
        // Drop foreign key if exists (try catch or check)
        // We use raw SQL for MariaDB compatibility and to be safe

        // Estimations: service_id -> film_id
        if (Schema::hasColumn('estimations', 'service_id')) {
            try {
                Schema::table('estimations', function (Blueprint $table) {
                    $table->dropForeign(['service_id']);
                });
            } catch (\Exception $e) {
                // FK might not exist or named differently
            }

            DB::statement("ALTER TABLE estimations CHANGE service_id film_id BIGINT UNSIGNED NOT NULL");
        }

        // Remove orphaned estimations before adding foreign key
        if (Schema::hasColumn('estimations', 'film_id')) {
            DB::statement("DELETE FROM estimations WHERE film_id NOT IN (SELECT id FROM films)");

            // Re-add foreign key
            // Check if FK already exists to avoid error? Or just try adding.
            // Constraint names are unique in DB.
            try {
                Schema::table('estimations', function (Blueprint $table) {
                    $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
                });
            } catch (\Exception $e) {
                // FK might already exist
            }
        }

        // Estimations: service_type -> film_type
        if (Schema::hasColumn('estimations', 'service_type')) {
            DB::statement("ALTER TABLE estimations CHANGE service_type film_type VARCHAR(255) NULL");
        }


        // 2. contact_messages table
        // ContactMessages: service_id -> film_id
        if (Schema::hasColumn('contact_messages', 'service_id')) {
            try {
                Schema::table('contact_messages', function (Blueprint $table) {
                    $table->dropForeign(['service_id']);
                });
            } catch (\Exception $e) {
            }

            // Note: service_id might be nullable in contact_messages
            DB::statement("ALTER TABLE contact_messages CHANGE service_id film_id BIGINT UNSIGNED NULL");
        }

        if (Schema::hasColumn('contact_messages', 'film_id')) {
            // Remove orphaned if strictly required, but for nullable it's fine to set null or just leave it if we don't enforce FK yet?
            // But we are enforcing FK below.
            // If we enforce FK, we must ensure integrity.
            // Update invalid film_ids to NULL
            DB::statement("UPDATE contact_messages SET film_id = NULL WHERE film_id NOT IN (SELECT id FROM films)");

            try {
                Schema::table('contact_messages', function (Blueprint $table) {
                    $table->foreign('film_id')->references('id')->on('films')->onDelete('set null');
                });
            } catch (\Exception $e) {
            }
        }


        // 3. films table (already renamed from services)
        // service_type -> film_type
        if (Schema::hasColumn('films', 'service_type')) {
            try {
                DB::statement("ALTER TABLE films CHANGE service_type film_type TEXT NULL"); // Model casts to array, so likely TEXT or JSON
            } catch (\Exception $e) {
                // 
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert films table
        if (Schema::hasColumn('films', 'film_type')) {
            DB::statement("ALTER TABLE films CHANGE film_type service_type TEXT NULL");
        }

        // Revert contact_messages
        if (Schema::hasColumn('contact_messages', 'film_id')) {
            try {
                Schema::table('contact_messages', function (Blueprint $table) {
                    $table->dropForeign(['film_id']);
                });
            } catch (\Exception $e) {
            }

            DB::statement("ALTER TABLE contact_messages CHANGE film_id service_id BIGINT UNSIGNED NULL");

            try {
                Schema::table('contact_messages', function (Blueprint $table) {
                    $table->foreign('service_id')->references('id')->on('films')->onDelete('set null');
                });
            } catch (\Exception $e) {
            }
        }

        // Revert estimations
        if (Schema::hasColumn('estimations', 'film_id')) {
            try {
                Schema::table('estimations', function (Blueprint $table) {
                    $table->dropForeign(['film_id']);
                });
            } catch (\Exception $e) {
            }

            DB::statement("ALTER TABLE estimations CHANGE film_id service_id BIGINT UNSIGNED NOT NULL");

            try {
                Schema::table('estimations', function (Blueprint $table) {
                    $table->foreign('service_id')->references('id')->on('films')->onDelete('cascade');
                });
            } catch (\Exception $e) {
            }
        }

        if (Schema::hasColumn('estimations', 'film_type')) {
            DB::statement("ALTER TABLE estimations CHANGE film_type service_type VARCHAR(255) NULL");
        }
    }
};
