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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',30)->nullable();
            $table->string('last_name',30)->nullable();

            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('marital_status')->nullable()->comment('1=Unmarried, 2=Married, 3=Divorced');

            $table->string('nationality',50)->nullable();


            $table->string('gender',10)->nullable();

            $table->string('phone_code',30)->nullable();
            $table->string('phone',30)->nullable();
            $table->string('additional_phone_code',30)->nullable();
            $table->string('additional_phone',30)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('identity_type',)->nullable()->comment('1=passport,2=NID');
            $table->string('identity_no',100)->nullable();
            $table->string('identity_proof',)->nullable();
            $table->string('identity_location',)->nullable();
            $table->string('pp_name')->nullable();
            $table->string('pp_location')->nullable();
            $table->string('religion')->nullable();
            $table->string('is_active')->nullable()->comment('1=active,0 or null = inactive, 2 = blocked');
            $table->string('is_verified')->nullable()->comment('1=verified,0 or null = not verified , 2 = pending, 3 = rejected' );
            $table->integer('terms')->nullable()->comment('0 or null = declined, 1 = accepted terms condition');




//            $table->unsignedBigInteger('blood_group_id')->nullable();
//            $table->foreign('blood_group_id')
//                ->references('id')
//                ->on('blood_groups')
//                ->onDelete('cascade');

            $table->foreignId('blood_group_id')->nullable()->constrained();
//            $table->foreignId('blood_group_id')->nullable()->constrained('table name');




            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

};
