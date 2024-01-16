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
        Schema::create('educations_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_id')->constrained('dentists')->onDelete('cascade');
            $table->string('name')->withComment('Education için okul adı, tecrübe için iş yeri adı');
            $table->string('title')->nullable()->withComment('Education için okul derecesi, tecrübe için iş yeri adı');
            $table->date('start_date')->nullable();
            $table->date('due_date');
            $table->tinyInteger('type')->withComment('0 -> education , 1 -> experience');
            $table->softDeletes();
            $table->timestamps();

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
