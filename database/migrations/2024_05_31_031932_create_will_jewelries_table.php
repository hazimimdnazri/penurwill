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
        Schema::create('will_jewelries', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('will_id');
            $table->string('jewelry')->nullable();
            $table->integer('type')->default(1);
            $table->float('weight')->nullable();
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('will_jewelries');
    }
};
