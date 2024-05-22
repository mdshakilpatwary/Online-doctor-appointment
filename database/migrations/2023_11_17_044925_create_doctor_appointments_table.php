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
        Schema::create('doctor_appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');         
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('doctor_schedule_id');

            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_schedule_id')->references('id')->on('doctor_schedules')->onDelete('restrict');

            $table->string('department');
            $table->date('appointment_date');
            $table->string('time');
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('unpaid');
            $table->float('fee');
            $table->string('patient_name');
            $table->string('age');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->integer('quantity')->default(1);
            $table->string('address');
            $table->string('patient_problem')->nullable();
            $table->integer('appointment_rating')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_appointments');
    }
};
