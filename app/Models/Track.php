<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public function strands()
    {
        return $this->hasMany(Strand::class);
    }
}
