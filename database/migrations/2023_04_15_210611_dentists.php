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
        Schema::create('dentists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id')->unsigned();

            $table->string('name');
            $table->string('surname');
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('profile_picture_path')->nullable();
            $table->boolean('gender')->nullable()->withComment('0 -> erkek, 1 -> kadın');
            $table->date('birth_date')->nullable();
            $table->text('about')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // unit_id sütunu için foreign key ilişkisi

            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
