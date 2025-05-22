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
    Schema::create('form_fields', function (Blueprint $table) {
        $table->id();
        $table->foreignId('form_template_id')->constrained()->onDelete('cascade');
        $table->string('field_name');
        $table->integer('x');
        $table->integer('y');
        $table->integer('font_size')->default(12);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};
