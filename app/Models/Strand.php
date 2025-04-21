<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function enrollments()
    {
        return $this->belongsToMany(Enrollment::class);
    }
}
