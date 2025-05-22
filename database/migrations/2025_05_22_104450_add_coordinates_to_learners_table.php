<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoordinatesToLearnersTable extends Migration
{
    public function up()
    {
        Schema::table('learners', function (Blueprint $table) {
            $table->float('top_position')->nullable()->after('section_id');
            $table->float('left_position')->nullable()->after('top_position');
        });
    }

    public function down()
    {
        Schema::table('learners', function (Blueprint $table) {
            $table->dropColumn(['top_position', 'left_position']);
        });
    }
}
