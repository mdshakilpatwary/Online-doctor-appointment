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
        Schema::create('experience_infos', function (Blueprint $table) {
            $table->id();
            $table->string('org_name');
            $table->string('department',50);

            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->string('job_status',10)->nullable();
            $table->string('position',50);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_infos');
    }
};
