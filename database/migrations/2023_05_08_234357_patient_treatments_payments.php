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
        Schema::create('patient_treatments_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_treatment_id')->constrained('patient_treatments')->onDelete('cascade');
            $table->string('paid_payment');
            $table->boolean('confirmed');
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
