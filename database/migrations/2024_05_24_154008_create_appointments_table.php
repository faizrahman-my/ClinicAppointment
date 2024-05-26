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
            $table->string('reservation_reason');
            $table->date('reservation_date');
            $table->string('reservation_time');
            $table->string('reservation_status');
            $table->string('status')->nullable();
            $table->string('room_no')->nullable();
            $table->time('appointment_time')->nullable();
            $table->mediumText('doctor_desc')->nullable();
            $table->mediumText('doctor_comment')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('staff_id')->nullable();
            $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
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
