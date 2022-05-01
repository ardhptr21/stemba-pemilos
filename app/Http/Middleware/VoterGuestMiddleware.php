<?php

namespace App\Http\Middleware;

use App\Models\Student;
use App\Models\Teacher;
use Closure;
use Illuminate\Http\Request;

class VoterGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $voter = session()->get('voter');

        if (isset($voter)) {
            if ($voter['type'] == 'student') {
                $voter = Student::find($voter['id']);
            } else {
                $voter = Teacher::find($voter['id']);
            }

            if ($voter) {
                return redirect()->route('vote.index');
            }
        }


        return $next($request);
    }
}
