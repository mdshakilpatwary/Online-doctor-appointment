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
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->integer('doc_title',)->nullable()->comment('1=Professor Dr. ,2=Assistant Professor Dr., 3=Associate Professor Dr., 4 = Distinguished Professor Dr., 5 = Dr. ');
            $table->string('license_no', 50)->nullable();
            $table->string('license_attachment')->nullable();
            $table->string('license_attachment_location')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experts');
    }
};
