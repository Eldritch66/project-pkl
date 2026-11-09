<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('entri_surat', function (Blueprint $table) {
            $table->dropColumn(['instruksi_disposisi', 'catatan_pimpinan']);
        });
    }

    public function down(): void
    {
        Schema::table('entri_surat', function (Blueprint $table) {
            $table->json('instruksi_disposisi')->nullable()->after('diteruskan_kepada');
            $table->text('catatan_pimpinan')->nullable()->after('instruksi_disposisi');
        });
    }
};
