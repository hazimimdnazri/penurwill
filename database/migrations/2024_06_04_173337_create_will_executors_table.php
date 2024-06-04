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
        Schema::create('will_executors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ic');
            $table->string('phone_mobile');
            $table->string('phone_home')->nullable();
            $table->string('phone_office')->nullable();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('zipcode');
            $table->string('city');
            $table->foreignId('state_id');
            $table->foreignUuid('will_id');
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('l_states')->onDelete('cascade');
            $table->foreign('will_id')->references('id')->on('wills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('will_executors');
    }
};
