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
        Schema::create('will_real_estates', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('will_id');
            $table->integer('type')->default(1);
            $table->foreignId('bank_id');
            $table->string('branch')->nullable();
            $table->string('account_number')->nullable();
            $table->string('size')->nullable();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('zipcode');
            $table->string('city');
            $table->foreignId('state_id');
            $table->json('beneficiaries')->nullable();
            $table->timestamps();

            $table->foreign('will_id')->references('id')->on('wills')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('l_banks')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('l_states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('will_real_estates');
    }
};
