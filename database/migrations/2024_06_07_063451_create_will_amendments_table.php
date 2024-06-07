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
        Schema::create('will_amendments', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('will_id');
            $table->string('ref_id')->nullable();
            $table->integer('status')->default(1);
            $table->string('remark')->nullable();
            $table->foreignId('transaction_id')->nullable();
            $table->timestamps();

            $table->foreign('will_id')->references('id')->on('wills')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('will_amendments');
    }
};
