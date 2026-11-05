<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('entri_surat', function (Blueprint $table) {
            $table->string('nomor_surat', 100)->nullable()->after('no_urut');
        });
    }

    public function down(): void
    {
        Schema::table('entri_surat', function (Blueprint $table) {
            $table->dropColumn('nomor_surat');
        });
    }
};
