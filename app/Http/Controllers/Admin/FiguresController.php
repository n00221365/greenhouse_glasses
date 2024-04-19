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


class FiguresController extends Controller
{
    /**
     * The homepage of each table, shows all the entries and all of theyre data, as well as being a point to enter crud functions
     */
    public function index()
    {

        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('admin.figures.index');// if the person attempting to access is an admin, show them the admin index
        }

        $figures = Figures::orderBy('created_at', 'desc')->paginate(4); // shows how many albums are displayed on each screen and in what order
        return view('admin.figures.index', [
            'figures' => $figures
        ]);

#
    }

    /** the form required to be filled in to create a new album     */
    public function create()
    {
        return view('admin.figures.create');
    }

    /**makes sure the created data is stored in the database
      */
    
    public function store(Request $request)
    {

        


        $rules = [ //decides how data has to be entered into the database. This is done to preserve the integrity of the table
            'firstName' => 'required|string|min:1|max:50',// has to be filled, a string, at least 1 character ans less than 50
            'lastName' => 'required|string|min:1|max:50', // has to be filled, a string, at least 1 character ans less than 10
            'image' => 'file|image',// has to be filled, a integer, at least 1 character ans less than 100
            'score' => 'required|integer|min:1|max:100',// has to be filled, a integer, at least 1 character ans less than 100

        ];


        /////


        $request->validate($rules, $messages); // validates the rules and messages

      
        $figures = new Figures; // when adding an entry to the database, all columns below must be present
        $figures->firstName = $request->firstName;  
        $figures->lastName = $request->lastName;    //searches for a title
        $figures->score = $request->score;  //searches for the runtime



        // this search is more complicated than the others. It is searching for an image, however, it
        //has to convert the name of the image file in order to make it more easy to store. For this example
        // the image is taken in, converted into the format of todays date, followed by the album title, then stored
        if ($request->hasFile('image')) { 
            $image = $request->file('image');
            $filename = date('Y-m-d-His') . '_' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);             
            $album->image = $filename;
                 }
        $figures->save();// pushed the data to the database

        return redirect()->route('admin.figures.index')->with('status', 'Created a new figure!');// brings the user back to the index upon completing the form

    }
    
   
    public function show(string $id) // shows an individual album and all of its associated data
    {
        $figures = Figures::findOrFail($id);
        return view('admin.figures.show', [
            'figures' => $figures
        ]);
    }

    /**gives the user a form to fill in in order to change a data entry     */
    public function edit(string $id)
    {
        $figures = Figures::findOrFail($id);
        return view('admin.figures.edit' , [
            'figures' => $figures
        ]);
    }


    public function update(Request $request, string $id) // pushes these changes to the database

   {

    //dd($request);

       $figures = Figures::findOrFail($id);
       //validation rules
       $rules = [
        'firstName' => 'required|string|min:1|max:50',// has to be filled, a string, at least 1 character ans less than 50
        'lastName' => 'required|string|min:1|max:50', // has to be filled, a string, at least 1 character ans less than 10
        'image' => 'file|image',// has to be filled, a integer, at least 1 character ans less than 100
        'score' => 'required|integer|min:1|max:100',// has to be filled, a integer, at least 1 character ans less than 100
    
       ];
       $request->validate($rules);

       $figures = new Figures; // when adding an entry to the database, all columns below must be present
       $figures->firstName = $request->firstName;  
       $figures->lastName = $request->lastName;    //searches for a title
       $figures->score = $request->score;  //searches for the runtime



       // this search is more complicated than the others. It is searching for an image, however, it
       //has to convert the name of the image file in order to make it more easy to store. For this example
       // the image is taken in, converted into the format of todays date, followed by the album title, then stored
       if ($request->hasFile('image')) { 
           $image = $request->file('image');
           $filename = date('Y-m-d-His') . '_' . $request->name . '.' . $image->getClientOriginalExtension();
           $image->storeAs('public/images', $filename);             
           $album->image = $filename;
                }



       $figures->save();

       return redirect()->route('admin.figures.index')->with('status', 'Updated figure!');
   }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) // for deleting data from the database permenantly
    {
            $figures = Figures::findOrFail($id);
            $figures->delete();

            return redirect()->route('admin.figures.index')->with('status', 'Selected figure deleted successfully!');
    }
}