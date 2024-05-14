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
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('role')->default(1); // 4 - Superadmin
            $table->string('password')->default(Hash::make(123456));
            $table->timestamp('date_verified')->nullable();
            $table->timestamp('date_password')->nullable();
            $table->boolean('isLocked')->default(false);
            $table->enum('flag', [0, 1])->default(1);
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
