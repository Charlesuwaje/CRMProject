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
        Schema::table('contact_email', function (Blueprint $table) {
            $table->foreign('email_id')->references('email_id')->on('email')->onDelete('cascade');
            $table->foreign('contact_id')->references('contact_id')->on('contacts')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_email', function (Blueprint $table) {
            $table->dropForeign(['email_id']);
            $table->dropForeign(['contact_id']);
        });
    }
};
