<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
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
        'status',
    ];
    
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class, 'chosen_strand'); // 'chosen_strand' is the foreign key
    }
}
