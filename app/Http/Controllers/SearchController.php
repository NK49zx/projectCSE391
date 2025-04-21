<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search for questions based on the query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (empty($query)) {
            return response()->json(['questions' => []]);
        }
        
        // Search in title and context fields
        $questions = Question::where('title', 'like', '%' . $query . '%')
            ->orWhere('context', 'like', '%' . $query . '%')
            ->orWhere('alt_content', 'like', '%' . $query . '%')
            ->select('id', 'title')
            ->limit(5)
            ->get();
            
        return response()->json(['questions' => $questions]);
    }
}
