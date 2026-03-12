<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exhibitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exhibition_category_id')->nullable();
            $table->string('exhibition_title');
            $table->string('director_name')->nullable();
            $table->text('synopsis')->nullable();
            $table->string('video')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('exhibition_category_id')
                  ->references('id')
                  ->on('exhibition_categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exhibitions');
    }
};
