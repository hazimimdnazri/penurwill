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
        Schema::create('will_hire_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('will_id');
            $table->string('brand');
            $table->string('model')->nullable();;
            $table->string('year')->nullable();
            $table->string('colour')->nullable();;
            $table->integer('type')->default(1); // Car / Motorcycle / Lorry
            $table->string('registration_number');
            $table->foreignId('bank_id')->nullable();;
            $table->boolean('isOnLoan')->default(true);
            $table->json('beneficiaries')->nullable();
            $table->timestamps();

            $table->foreign('will_id')->references('id')->on('wills')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('l_banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('will_hire_purchases');
    }
};
