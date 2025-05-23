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
        // Users Table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');                       // ✅ First Name
            $table->string('lastname');                        // ✅ Last Name
            $table->string('username')->unique();              // ✅ Unique Username
            $table->string('email')->unique();                 // ✅ Email
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');                        // ✅ Password
            $table->rememberToken();                           // ✅ Remember Token
            $table->timestamps();
        });

        // Password Reset Tokens Table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();                // ✅ Primary key on email
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Sessions Table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index(); // ✅ Link to users table
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
