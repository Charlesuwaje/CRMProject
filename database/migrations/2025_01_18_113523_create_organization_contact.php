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
        Schema::create('organization_contact', function (Blueprint $table) {
            $table->id('organization_contact_id');
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('organization_id');
            $table->boolean('is_primary_contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_contact');
    }
};
