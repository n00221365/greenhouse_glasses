<?php

namespace App\Http\Controllers\Admin; //shows where in the directory the file is
use App\Http\Controllers\Controller;// extends the controllers controller
use Illuminate\Support\Facades\Storage;//shows that this file is responsible for storing data
use Illuminate\Http\Request; // used for retrieving data that has been input
use App\Models\Figures; // makes use of the relationship of the artist table
use App\Models\Question; // makes use of the relationship of the album table
use App\Models\Score; // makes use of the relationship of the song table
use App\Models\Answer; // makes use of the relationship of the song table

use Auth; // makes sure that the user is an admin before allowing them to procede


class QuestionController extends Controller
{
    /**
     * The homepage of each table, shows all the entries and all of theyre data, as well as being a point to enter crud functions
     */
    public function index()
    {

        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('admin.questions.index');// if the person attempting to access is an admin, show them the admin index
        }

        $questions = Question::orderBy('created_at', 'desc')->paginate(4); // shows how many albums are displayed on each screen and in what order
        return view('admin.questions.index', [
            'questions' => $questions
        ]);

#
    }

    /** the form required to be filled in to create a new album     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**makes sure the created data is stored in the database
      */
    
    public function store(Request $request)
    {

        


        $rules = [ //decides how data has to be entered into the database. This is done to preserve the integrity of the table
            'number' => 'required|integer|min:1|max:50',// has to be filled, a string, at least 1 character ans less than 50
            'question' => 'required|string|min:1|max:150', // has to be filled, a string, at least 1 character ans less than 10
        ];


        /////


        $request->validate($rules, $messages); // validates the rules and messages

      
        $question = new Question; // when adding an entry to the database, all columns below must be present
        $question->number = $request->number;    //searches for a title
        $question->question = $request->question;  //searches for the runtime



        // this search is more complicated than the others. It is searching for an image, however, it
        //has to convert the name of the image file in order to make it more easy to store. For this example
        // the image is taken in, converted into the format of todays date, followed by the album title, then stored

        $question->save();// pushed the data to the database

        return redirect()->route('admin.questions.index')->with('status', 'Created a new question!');// brings the user back to the index upon completing the form

    }
    
   
    public function show(string $id) // shows an individual album and all of its associated data
    {
        $question = Question::findOrFail($id);
        return view('admin.questions.show', [
            'question' => $question
        ]);
    }

    /**gives the user a form to fill in in order to change a data entry     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);
        return view('admin.questions.edit' , [
            'question' => $question
        ]);
    }


    public function update(Request $request, string $id) // pushes these changes to the database

   {

    //dd($request);

       $question = Question::findOrFail($id);
       //validation rules
       $rules = [
        'number' => 'required|integer|min:1|max:50',// has to be filled, a string, at least 1 character ans less than 50
        'question' => 'required|string|min:1|max:150', // has to be filled, a string, at least 1 character ans less than 10
    
       ];
       $request->validate($rules);

       $question = new Question; // when adding an entry to the database, all columns below must be present
       $question->number = $request->number;    //searches for a title
       $question->question = $request->question;  //searches for the runtime



       $question->save();

       return redirect()->route('admin.questions.index')->with('status', 'Updated question!');
   }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) // for deleting data from the database permenantly
    {
            $question = Question::findOrFail($id);
            $question->delete();

            return redirect()->route('admin.questions.index')->with('status', 'Selected question deleted successfully!');
    }
}