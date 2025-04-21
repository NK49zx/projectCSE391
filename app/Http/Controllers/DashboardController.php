<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     */
    public function index()
    {
        // Get the latest questions with their users
        $questions = Question::with('user')
            ->latest()
            ->take(5)
            ->get();
            
        // Get the most viewed questions
        $popularQuestions = Question::with('user')
            ->orderBy('views', 'desc')
            ->take(3)
            ->get();
            
        return view('dashboard', compact('questions', 'popularQuestions'));
    }
}
