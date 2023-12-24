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
        Schema::create('cartelas', function (Blueprint $table) {
            $table->id();
            $table->string('numeros_da_sorte');
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default('inativo');
            $table->timestamps();

            $table->foreign('user_id')
                ->on('users')
                ->references('id');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartelas');
    }
};
