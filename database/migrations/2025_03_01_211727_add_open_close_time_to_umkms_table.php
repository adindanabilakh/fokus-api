<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('u_m_k_m_s', function (Blueprint $table) {
            $table->time('open_time')->nullable()->after('description');
            $table->time('close_time')->nullable()->after('open_time');
        });
    }

    public function down()
    {
        Schema::table('u_m_k_m_s', function (Blueprint $table) {
            $table->dropColumn(['open_time', 'close_time']);
        });
    }
};
