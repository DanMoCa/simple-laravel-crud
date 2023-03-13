<?php

namespace App\Http\Controllers;

use App\Models\Shark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SharkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // TODO: Task 2 - Show the index blade of sharks
        // show the sharks.index view with a variable named sharks for the list of all the existing sharks
        $sharks = Shark::all();
        return view('sharks.index')->with(compact('sharks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // TODO: task 3 - Show the Shark create form
        // show the sharks.create view to the user
        return view('sharks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'email' => ['required','email'],
            'shark_level' => ['required','numeric','between:1,3']
        ]);

        if($validator->fails()){
            return redirect('sharks/create')
                ->withErrors($validator)
                ->withInput($request->all());
        }else{
            // TODO: task 4 - Add the logic to store a shark
            // Add 2 lines of code
            // first line to create the Shark using the validated request parameters
            // second line to redirect the user to the sharks index with a variable named message with a success message to the user

            Shark::create($validator->validated());
            return redirect('sharks')->with('message','Successfully created shark!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Shark $shark)
    {
        // TODO: task 5 - Add the logic to show a single shark
        // write one line of code to show the sharks.show view with the shark model
        return view('sharks.show')->with(compact('shark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shark $shark)
    {
        // TODO: task 6 - Add the logic to show the edit shark form
        // write one line of code to show the sharks.edit view with the provided shark
        return view('sharks.edit')->with(compact('shark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shark $shark)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['string'],
            'email' => ['string','email'],
            'shark_level' => ['numeric','nullable','between:1,3']
        ]);

        if($validator->fails()){
            return redirect('sharks.edit')
                ->withErrors($validator)
                ->withInput($request->all());
        }else{

            // TODO: task 7 - Add the logic to update a shark
            // write two lines of code
            // first line to update the selected shark with the validated form parameters
            // second line to redirect the user to the sharks.index route with a message variable with a success message to the user.
            $shark->update($validator->validated());
            return redirect('sharks')->with('message','Successfully updated shark!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shark $shark)
    {
        // TODO: task 8 - Add the logic to destroy a shark
        // write two lines of code
        // first line to delete the selected shark
        // second line to redirect the user to the sharks.index route with a message variable with a success message to the user.
        $shark->delete();
        return redirect('sharks')->with('message','Successfully deleted the shark!');
    }
}
