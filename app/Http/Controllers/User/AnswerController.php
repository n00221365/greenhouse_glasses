<?php

namespace App\Http\Controllers\User; //shows where in the directory the file is
use App\Http\Controllers\Controller;// extends the controllers controller
use Illuminate\Support\Facades\Storage;//shows that this file is responsible for storing data
use Illuminate\Http\Request; // used for retrieving data that has been input
use App\Models\Figures; // makes use of the relationship of the artist table
use App\Models\Question; // makes use of the relationship of the album table
use App\Models\Score; // makes use of the relationship of the song table
use App\Models\Answer; // makes use of the relationship of the song table


class AnswerController extends Controller
{
    /**
     * The homepage of each table, shows all the entries and all of theyre data, as well as being a point to enter crud functions
     */
    public function index()
    {


        $scores = Score::orderBy('created_at', 'desc')->paginate(4);
        
        // shows how many albums are displayed on each screen and in what order

        dd($answers);
        return view('User.answers.index', [
            'answers' => $answers
        ]);

#
    }

    /** the form required to be filled in to create a new album     */
    public function create()
    {
        return view('User.answers.create');
    }

    /**makes sure the created data is stored in the database
      */
    
    public function store(Request $request)
    {

        


        $rules = [ //decides how data has to be entered into the database. This is done to preserve the integrity of the table
            'question_id' => 'required|string|min:1|max:50',// has to be filled, a string, at least 1 character ans less than 50
            'col1answer' => 'required|string|min:1|max:100', // has to be filled, a string, at least 1 character ans less than 10
            'col2answer' => 'required|string|min:1|max:100', // has to be filled, a string, at least 1 character ans less than 10
            'col3answer' => 'required|string|min:1|max:100', // has to be filled, a string, at least 1 character ans less than 10
            'col4answer' => 'required|string|min:1|max:100', // has to be filled, a string, at least 1 character ans less than 10

            'value' => 'required|integer|min:1|max:100',// has to be filled, a integer, at least 1 character ans less than 100
        ];


        /////


        $request->validate($rules, $messages); // validates the rules and messages

      
        $answer = new Answer; // when adding an entry to the database, all columns below must be present
        $answer->question_id = $request->question_id;    //searches for a title
        $answer->col1answer = $request->col1answer;  //searches for the runtime
        $answer->col2answer = $request->col2answer;  //searches for the runtime
        $answer->col3answer = $request->col3answer;  //searches for the runtime
        $answer->col4answer = $request->col4answer;  //searches for the runtime

        $answer->value = $request->value; // searches for how many songs there are



        // this search is more complicated than the others. It is searching for an image, however, it
        //has to convert the name of the image file in order to make it more easy to store. For this example
        // the image is taken in, converted into the format of todays date, followed by the album title, then stored

        $score->save();// pushed the data to the database

        return redirect()->route('User.answers.index')->with('status', 'Created a new answer!');// brings the user back to the index upon completing the form

    }
    
   
    public function show(string $id) // shows an individual album and all of its associated data
    {
        $answer = Answer::findOrFail($id);
        return view('User.answers.show', [
            'answer' => $answer
        ]);
    }

    /**gives the user a form to fill in in order to change a data entry     */
    public function edit(string $id)
    {
        $answer = Answer::findOrFail($id);
        return view('User.answers.edit' , [
            'answer' => $answer
        ]);
    }


    public function update(Request $request, string $id) // pushes these changes to the database

   {

    //dd($request);

       $answer = Answer::findOrFail($id);
       //validation rules
       $rules = [
        'col1answer' => 'required|string|min:1|max:100', // has to be filled, a string, at least 1 character ans less than 10
        'col2answer' => 'required|string|min:1|max:100', // has to be filled, a string, at least 1 character ans less than 10
        'col3answer' => 'required|string|min:1|max:100', // has to be filled, a string, at least 1 character ans less than 10
        'col4answer' => 'required|string|min:1|max:100', // has to be filled, a string, at least 1 character ans less than 10
    
       ];
       $request->validate($rules);

       $answer = new Answer; // when adding an entry to the database, all columns below must be present
       $answer->question_id = $request->question_id;    //searches for a title
       $answer->col1answer = $request->col1answer;  //searches for the runtime
       $answer->col2answer = $request->col2answer;  //searches for the runtime
       $answer->col3answer = $request->col3answer;  //searches for the runtime
       $answer->col4answer = $request->col4answer;  //searches for the runtime       $answer->value = $request->value; // searches for how many songs there are



       $score->save();

       return redirect()->route('User.answers.index')->with('status', 'Updated answer!');
   }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) // for deleting data from the database permenantly
    {
            $answer = Answer::findOrFail($id);
            $answer->delete();

            return redirect()->route('User.answers.index')->with('status', 'Selected answer deleted successfully!');
    }
}