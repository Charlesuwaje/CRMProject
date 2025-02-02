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
        Schema::create('contact_phone', function (Blueprint $table) {
            $table->id('contact_phone_id');
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('phone_id');
            $table->string('contact_phone_type');
            $table->boolean('is_primary_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_phone');
    }
};
