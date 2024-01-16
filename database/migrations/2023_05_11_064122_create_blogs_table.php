<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dentist_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned()->nullable();

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            // dentist_id sütunu için foreign key ilişkisi
            $table->foreign('dentist_id')->references('id')->on('dentists')->onDelete('cascade');

            // category_id sütunu için foreign key ilişkisi
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
