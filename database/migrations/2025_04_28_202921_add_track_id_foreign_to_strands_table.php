<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('strands', function (Blueprint $table) {
            $table->foreign('track_id')
                ->references('id')
                ->on('tracks')
                ->onDelete('restrict') // or 'cascade' if you prefer
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('strands', function (Blueprint $table) {
            $table->dropForeign(['track_id']);
        });
    }
};
