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
        Schema::create('counselor_session_feedback', function (Blueprint $table) {
            $table->id();
            $table->integer('rate');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('counselor_id');
            $table->unsignedBigInteger('counselor_session_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('counselor_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('counselor_session_id')
                ->references('id')
                ->on('counselor_sessions')
                ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counselor_session_feedback');
    }
};
