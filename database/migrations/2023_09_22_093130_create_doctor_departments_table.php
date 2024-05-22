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
        Schema::create('doctor_departments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('doctor_id');
            // $table->unsignedBigInteger('department_id');

            // $table->foreign('doctor_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade');

            // $table->foreign('department_id')
            //     ->references('id')
            //     ->on('departments')
            //     ->onDelete('cascade');
            $table->string('doctor_department')->uniqid();
            $table->integer('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_departments');
    }
};
