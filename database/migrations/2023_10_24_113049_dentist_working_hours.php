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
        Schema::create('dentist_working_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dentist_id');
            $table->string('day')->nullable();
            $table->time('start_date')->nullable();
            $table->time('due_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('dentist_id')->references('id')->on('dentists');

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
