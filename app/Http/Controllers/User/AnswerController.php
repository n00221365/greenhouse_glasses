<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Answer;

// the exact same as the admin controllers with just the index and show functions
class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answers = Answer::orderBy('created_at', 'desc')->paginate(4);
        return view('User.Answers.index', [
            'answers' => $answers
        ]);
    }

 

    public function show(string $id)
    {
        $answer = Answer::findOrFail($id);

        return view('user.answers.show')->with('answer', $answer);
    }

}