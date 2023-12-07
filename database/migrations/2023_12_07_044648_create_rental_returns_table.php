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
        Schema::create('rental_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained();
            $table->date('return_date');
            $table->integer('rental_days');
            $table->integer('rental_fee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_returns');
    }
};
