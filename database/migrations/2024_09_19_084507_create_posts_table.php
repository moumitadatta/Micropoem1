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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_sub_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_background_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_file_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('point')->default(0);
            $table->text('post_content');
            $table->string('post_name');
            $table->enum('status', ['active', 'inactive'])->default('draft');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
