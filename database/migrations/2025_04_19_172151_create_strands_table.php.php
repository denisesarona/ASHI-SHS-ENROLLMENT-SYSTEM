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
        Schema::create('strands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('track_id')
                  ->constrained('tracks')
                  ->onDelete('cascade'); // optional, good for cleanup
            $table->string('name');
            $table->timestamps();
        });        
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strands');
    }
};
