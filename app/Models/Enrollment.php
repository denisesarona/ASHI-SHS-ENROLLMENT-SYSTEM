<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['school_year', 'grade_level'];

    public function strands()
    {
        return $this->belongsToMany(Strand::class);
    }
}