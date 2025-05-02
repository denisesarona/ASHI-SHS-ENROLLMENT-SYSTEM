<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Summary extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_year',
        'grade_level',
        'last_name',
        'first_name',
        'middle_name',
        'extension_name',
        'lrn',
        'birthdate',
        'age',
        'gender',
        'beneficiary',
        'street',
        'baranggay',
        'municipality',
        'province',
        'guardian_name',
        'guardian_contact',
        'relationship_guardian',
        'last_sy',
        'last_school',
        'learner_category',
        'grade10_section',
        'image',
        'chosen_strand',
        'section',
    ];
}
