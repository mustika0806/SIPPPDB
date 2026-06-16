<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('interview_tests', 'interview_type')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->string('interview_type')->nullable()->after('user_id');
            });
        }

        if (!Schema::hasColumn('interview_tests', 'interview_time')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->time('interview_time')->nullable()->after('interview_date');
            });
        }

        if (!Schema::hasColumn('interview_tests', 'interview_place')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->string('interview_place')->nullable()->after('interview_time');
            });
        }

        if (!Schema::hasColumn('interview_tests', 'meeting_link')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->string('meeting_link')->nullable()->after('interview_place');
            });
        }

        if (!Schema::hasColumn('interview_tests', 'whatsapp_number')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->string('whatsapp_number')->nullable()->after('meeting_link');
            });
        }

        DB::statement("ALTER TABLE interview_tests MODIFY status ENUM('belum', 'terjadwal', 'lulus', 'tidak_lulus') NOT NULL DEFAULT 'belum'");
    }

    public function down(): void
    {
        DB::statement("UPDATE interview_tests SET status = 'belum' WHERE status = 'terjadwal'");
        DB::statement("ALTER TABLE interview_tests MODIFY status ENUM('belum', 'lulus', 'tidak_lulus') NOT NULL DEFAULT 'belum'");

        if (Schema::hasColumn('interview_tests', 'whatsapp_number')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->dropColumn('whatsapp_number');
            });
        }

        if (Schema::hasColumn('interview_tests', 'meeting_link')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->dropColumn('meeting_link');
            });
        }

        if (Schema::hasColumn('interview_tests', 'interview_place')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->dropColumn('interview_place');
            });
        }

        if (Schema::hasColumn('interview_tests', 'interview_time')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->dropColumn('interview_time');
            });
        }

        if (Schema::hasColumn('interview_tests', 'interview_type')) {
            Schema::table('interview_tests', function (Blueprint $table) {
                $table->dropColumn('interview_type');
            });
        }
    }
};