<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('kelas_id')
                  ->constrained('kelas')
                  ->onDelete('cascade');

            $table->string('judul');

            $table->string('original_filename');
            $table->string('stored_filename');
            $table->string('file_extension');
            $table->bigInteger('file_size');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
