<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "nis",
        "class",
        "major",
        "index",
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
        })->when($request->get('major'), function ($query) use ($request) {
            $query->where('major', $request->get('major'));
        })->when($request->get('class'), function ($query) use ($request) {
            $query->where('class', $request->get('class'));
        })->when($request->get('index'), function ($query) use ($request) {
            $query->where('index', $request->get('index'));
        });
    }
}
