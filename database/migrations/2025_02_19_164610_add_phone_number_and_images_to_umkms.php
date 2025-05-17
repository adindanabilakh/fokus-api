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
        Schema::table('u_m_k_m_s', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->after('email'); // 🆕 Tambah nomor telepon
            $table->json('images')->nullable()->after('document'); // 🆕 Multi-image, simpan dalam format JSON
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('u_m_k_m_s', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'images']);
        });
    }
};
