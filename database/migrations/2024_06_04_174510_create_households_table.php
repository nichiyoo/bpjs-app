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
        Schema::create('households', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nks');
            $table->enum('category', ['Seruti', 'Susenas']);
            $table->enum('type', ['IPDS', 'Produksi']);
            $table->integer('before')->unsigned();
            $table->integer('after')->unsigned();
            $table->integer('household')->unsigned();
            $table->foreign('nks')
                ->references('nks')
                ->on('officers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('households');
    }
};
