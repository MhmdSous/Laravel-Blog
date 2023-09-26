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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->text('title_ar');  // Title of our blog post
            $table->text('title_en');  // Title of our blog post
            $table->text('body_ar');   // Body of our blog post
            $table->text('body_en');   // Body of our blog post
            $table->string('image')->nullable(); // image of our blog post
            $table->text('user_id'); // user_id of our blog post author
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
