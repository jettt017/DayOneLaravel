<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(
            session('user_id')
        );

        return view('dashboard', [
            'totalNotes' => $user->notes()->count(),

            'totalSummaries' => $user
                ->notes()
                ->whereNotNull('summary')
                ->count(),

            'totalQuizzes' => $user
                ->notes()
                ->withCount('quizzes')
                ->get()
                ->sum('quizzes_count'),

            'latestNotes' => $user
                ->notes()
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
