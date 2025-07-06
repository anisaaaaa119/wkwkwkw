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
        Schema::table('barangs', function (Blueprint $table) {
            if (!Schema::hasColumn('barangs', 'kondisi')) {
                $table->string('kondisi')->after('jumlah');
            }

            if (!Schema::hasColumn('barangs', 'keterangan')) {
                $table->string('keterangan')->after('kondisi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            if (Schema::hasColumn('barangs', 'kondisi')) {
                $table->dropColumn('kondisi');
            }

            if (Schema::hasColumn('barangs', 'keterangan')) {
                $table->dropColumn('keterangan');
            }
        });
    }
};