<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Score;

// the exact same as the admin controllers with just the index and show functions
class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scores = Score::orderBy('created_at', 'desc')->paginate(4);
        return view('user.scores.index', [
            'scores' => $scores
        ]);
    }

 

    public function show(string $id)
    {
        $score = Score::findOrFail($id);

        return view('user.scores.show')->with('score', $score);
    }

}