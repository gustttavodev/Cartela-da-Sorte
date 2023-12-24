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
        Schema::table('cartelas', function(Blueprint $table){
            $table->unsignedBigInteger('sorteio_id');

            $table->foreign('sorteio_id')
            ->on('sorteios')
            ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cartelas', function(Blueprint $table){

            $table->dropForeign(['sorteio_id']);
            $table->dropColumn('sorteio_id');

        });
    }
};
