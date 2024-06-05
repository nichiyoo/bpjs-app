<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected array $answers = [
        'Terisi Lengkap',
        'Terisi Tidak Lengkap',
        'Tidak Ada ART/Responden Yang Dapat Memberi Jawaban',
        'Responden Menolak',
        'Responden Menolak (Tidak Ada ART)',
        'Rumah Tangga Pindah'
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nks');
            $table->enum('category', ['Seruti', 'Susenas']);
            $table->enum('type', ['IPDS', 'Produksi']);
            $table->integer('sample');
            $table->enum('kor', $this->answers);
            $table->enum('kp', $this->answers);
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('progress');
    }
};
