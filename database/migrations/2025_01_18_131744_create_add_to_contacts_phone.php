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
        Schema::table('contact_phone', function (Blueprint $table) {
            $table->foreign('contact_id')->references('contact_id')->on('contacts')->onDelete('cascade');
            $table->foreign('phone_id')->references('phone_id')->on('phones')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_phone', function (Blueprint $table) {
            $table->dropForeign(['contact_id']);
            $table->dropForeign(['phone_id']);
        });
    }
};
