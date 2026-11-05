<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('entri_surat', function (Blueprint $table) {
            $table->string('ringkasan')->nullable()->after('perihal');
        });
    }

    public function down(): void
    {
        Schema::table('entri_surat', function (Blueprint $table) {
            $table->dropColumn('ringkasan');
        });
    }
};
