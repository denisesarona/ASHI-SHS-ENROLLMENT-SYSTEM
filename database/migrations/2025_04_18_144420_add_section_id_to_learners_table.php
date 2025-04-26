<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learners', function (Blueprint $table) {
            $table->unsignedBigInteger('section_id')->nullable()->after('status');

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('learners', function (Blueprint $table) {
            $table->dropForeign(['section_id']);
            $table->dropColumn('section_id');
        });
    }
};
