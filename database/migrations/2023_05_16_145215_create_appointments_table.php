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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_id')->constrained('dentists')->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->string('phone_number');
            $table->string('operation');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->string('description')->nullable();
            $table->boolean('is_attended')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
