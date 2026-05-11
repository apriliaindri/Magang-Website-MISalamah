<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hasil_tugas', function (Blueprint $table) {
            $table->string('nama')->after('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('hasil_tugas', function (Blueprint $table) {
            $table->dropColumn('nama');
        });
    }
};
