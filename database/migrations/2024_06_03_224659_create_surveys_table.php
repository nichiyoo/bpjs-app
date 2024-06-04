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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->date('start');
            $table->date('end');
            $table->string('annotation')->nullable();
            $table->integer('sample');
            $table->integer('document');
            $table->integer('entry');
            $table->enum('status', ['Berjalan', 'Selesai']);
            $table->enum('duration', ['Bulanan', 'Tahunan']);
            $table->enum('type', ['IPDS', 'Produksi', 'Distribusi', 'Neraca', 'Sosial']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
