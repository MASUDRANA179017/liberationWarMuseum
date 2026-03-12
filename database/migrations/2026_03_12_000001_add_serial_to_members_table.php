<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            if (!Schema::hasColumn('members', 'serial')) {
                $table->unsignedInteger('serial')->nullable()->unique()->after('id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            if (Schema::hasColumn('members', 'serial')) {
                $table->dropUnique(['serial']);
                $table->dropColumn('serial');
            }
        });
    }
};

