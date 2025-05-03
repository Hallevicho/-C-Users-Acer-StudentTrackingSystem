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
        Schema::table('users', function (Blueprint $table) {
            // Add the new fields
            $table->string('middlename')->nullable();  // Add middlename
            $table->string('course')->nullable();      // Add course
            $table->string('school')->nullable();      // Add school
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the added fields if the migration is rolled back
            $table->dropColumn(['middlename', 'course', 'school']);
        });
    }
};

