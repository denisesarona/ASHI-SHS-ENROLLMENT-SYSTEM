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
        Schema::create('learners', function (Blueprint $table) {
            $table->id();
            $table->string('school_year');
            $table->string('grade_level');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('extension_name')->nullable();
            $table->string('lrn')->unique();
            $table->date('birthdate');
            $table->integer('age');
            $table->string('gender');
            $table->string('beneficiary')->nullable();
            $table->string('street')->nullable();
            $table->string('baranggay');
            $table->string('municipality');
            $table->string('province');
            $table->string('guardian_name');
            $table->string('guardian_contact');
            $table->string('relationship_guardian')->nullable();
            $table->string('last_sy');
            $table->string('last_school');
            $table->string('learner_category');
            $table->string('grade10_section');
            $table->string('grade10_card')->nullable();
            $table->string('chosen_strand');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learners');
    }
};
