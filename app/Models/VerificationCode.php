<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'code', 'expires_at'];

    public $timestamps = false; // If you don't need created_at and updated_at
}
