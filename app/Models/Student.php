<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "nis",
        "class",
        "major",
        "status",
        "candidate_id",
        "password"
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
