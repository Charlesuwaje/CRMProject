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
        Schema::create('contact_email', function (Blueprint $table) {
            $table->id('contact_email_id');
            $table->unsignedBigInteger('email_id');
            $table->unsignedBigInteger('contact_id');
            $table->string('contact_email_type');
            $table->boolean('is_primary_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_email');
    }
};
