<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $columns = [
                'project_number',
                'project_category_id',
                'description',
                'project_date',
                'project_end_date',
                'product',
                'color',
                'area',
                'client',
                'chemical'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('projects', $column)) {
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
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('project_number')->nullable();
            $table->foreignId('project_category_id')->nullable()->constrained('project_categories');
            $table->text('description')->nullable();
            $table->date('project_date')->nullable();
            $table->date('project_end_date')->nullable();
            $table->string('product')->nullable();
            $table->string('color')->nullable();
            $table->string('area')->nullable();
            $table->string('client')->nullable();
            $table->string('chemical')->nullable();
        });
    }
};
