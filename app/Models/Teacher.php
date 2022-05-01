<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "nip",
        "status",
        "candidate_id",
        "password"
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function scopeFilter(Builder $query, Request $request): Builder
    {
        return $query->when($request->get('status'), function ($query) use ($request) {
            $query->where('status', $request->get('status'));
        });
    }
}
