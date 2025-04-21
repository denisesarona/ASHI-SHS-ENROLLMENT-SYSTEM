<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function enrollments()
    {
        return $this->belongsToMany(Enrollment::class);
    }
}
