<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('products') && !Schema::hasTable('projects')) {
            Schema::rename('products', 'projects');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('projects') && !Schema::hasTable('products')) {
            Schema::rename('projects', 'products');
        }
    }
};
