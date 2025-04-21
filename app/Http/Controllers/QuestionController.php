<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display the question form.
     */
    public function create()
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
            
        return view('question', compact('questions', 'popularQuestions'));
    }

    //public function create()
    //{
    //    return view('question');
    //}

    /**
     * Store a newly created question in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'context' => 'required|string',
            'alt_content' => 'nullable|string',
        ]);

        // Add the user_id to the validated data
        $validated['user_id'] = Auth::id();
        $validated['is_answered'] = false;
        $validated['views'] = 0;

        // Create the question
        Question::create($validated);

        return redirect()->route('dashboard')->with('success', 'Question submitted successfully!');
    }
}
