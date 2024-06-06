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
        Schema::create('will_businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('will_id');
            $table->string('business');
            $table->string('registration_number')->nullable();
            $table->string('amount')->nullable();
            $table->json('beneficiaries')->nullable();
            $table->timestamps();

            $table->foreign('will_id')->references('id')->on('wills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('will_businesses');
    }
};
