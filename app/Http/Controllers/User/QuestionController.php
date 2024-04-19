<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Question;

// the exact same as the admin controllers with just the index and show functions
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->paginate(4);
        return view('user.questions.index', [
            'questions' => $questions
        ]);
    }

 

    public function show(string $id)
    {
        $question = Question::findOrFail($id);

        return view('user.questions.show')->with('question', $question);
    }

}