
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            // =====================
            // WORKFLOW CONTROL
            // =====================
            $table->unsignedTinyInteger('step')->default(1);
            $table->timestamp('biodata_completed_at')->nullable();
            $table->timestamp('wali_completed_at')->nullable();
            $table->timestamp('sekolah_completed_at')->nullable();

            // =====================
            // CLEANER STRUCTURE (optional improvement)
            // =====================
            // $table->string('nama_lengkap')->nullable()->after('user_id');

            // =====================
            // INDEX (performance penting untuk PPDB)
            // =====================
            $table->index(['user_id', 'pendaftaran_id']);
            $table->index('status');
            
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn([
                'step',
                'biodata_completed_at',
                'wali_completed_at',
                'sekolah_completed_at',
                'nama_lengkap',
            ]);

            $table->dropIndex(['user_id', 'pendaftaran_id']);
        });
    }
};