<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('soal_pg', function (Blueprint $table) {
            $table->string('status')->default('draft');
        });
    }

    public function down(): void
    {
        Schema::table('soal_pg', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
