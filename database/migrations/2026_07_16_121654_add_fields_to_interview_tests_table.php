<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('interview_tests', function (Blueprint $table) {
            if (!Schema::hasColumn('interview_tests', 'interview_type')) {
                $table->enum('interview_type', ['online', 'offline'])
                    ->nullable()
                    ->after('user_id');
            }

            if (!Schema::hasColumn('interview_tests', 'interview_time')) {
                $table->time('interview_time')
                    ->nullable()
                    ->after('interview_date');
            }

            if (!Schema::hasColumn('interview_tests', 'meeting_link')) {
                $table->string('meeting_link')
                    ->nullable()
                    ->after('interview_time');
            }

            if (!Schema::hasColumn('interview_tests', 'interview_place')) {
                $table->string('interview_place')
                    ->nullable()
                    ->after('meeting_link');
            }
        });

        DB::statement("ALTER TABLE interview_tests MODIFY status ENUM('belum', 'terjadwal', 'lulus', 'tidak_lulus') DEFAULT 'belum'");
    }

    public function down(): void
    {
        Schema::table('interview_tests', function (Blueprint $table) {
            if (Schema::hasColumn('interview_tests', 'interview_type')) {
                $table->dropColumn('interview_type');
            }

            if (Schema::hasColumn('interview_tests', 'interview_time')) {
                $table->dropColumn('interview_time');
            }

            if (Schema::hasColumn('interview_tests', 'meeting_link')) {
                $table->dropColumn('meeting_link');
            }

            if (Schema::hasColumn('interview_tests', 'interview_place')) {
                $table->dropColumn('interview_place');
            }
        });

        DB::statement("ALTER TABLE interview_tests MODIFY status ENUM('belum', 'lulus', 'tidak_lulus') DEFAULT 'belum'");
    }
};