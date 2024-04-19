<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Figures;

// the exact same as the admin controllers with just the index and show functions
class FiguresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $figures = Figures::orderBy('created_at', 'desc')->paginate(4);
        return view('user.figures.index', [
            'figures' => $figures
        ]);
    }

 

    public function show(string $id)
    {
        $figures = Figures::findOrFail($id);

        return view('user.figures.show')->with('figures', $figures);
    }

}