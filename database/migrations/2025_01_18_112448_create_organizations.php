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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id('organization_id');
            $table->string('name');
            $table->decimal('annual_revenue', 15, 2)->nullable();
            $table->date('estd_date')->nullable();
            $table->string('legal_structure')->nullable();
            $table->string('type_of_business')->nullable();
            $table->string('occupation')->nullable();
            $table->unsignedInteger('employee_count')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
