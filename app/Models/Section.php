<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'max_learner'];

    public function learners()
    {
        return $this->hasMany(Learner::class);
    }

    public function strands()
    {
        return $this->belongsToMany(Strand::class, 'section_strand');
    }
}
