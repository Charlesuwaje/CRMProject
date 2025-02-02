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
            $table->id('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->boolean('is_account_expired')->default(false);
            $table->boolean('is_account_locked')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_credentials_expired')->default(false);
            $table->timestamp('last_password_reset_date')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('user_profile_photo')->nullable();
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->unsignedBigInteger('visibility_group_id')->nullable();
            $table->unsignedBigInteger('userset_id')->nullable();
            $table->date('dob')->nullable();
            $table->string('security_question')->nullable();
            $table->string('security_answer')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
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
