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
        Schema::create('training_infos', function (Blueprint $table) {
            $table->id();
            $table->string('institute');
            $table->string('specialization');

            $table->date('from_date');
            $table->date('to_date');
            $table->string('training_title',100);
            $table->string('training_certificate');
            $table->string('certificate_location');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_infos');
    }
};
