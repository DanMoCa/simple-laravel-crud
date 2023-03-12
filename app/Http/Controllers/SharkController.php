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
        $sharks = Shark::all();

        return view('sharks.index')->with(compact('sharks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
            'shark_level' => ['required','numeric']
        ]);

        if($validator->fails()){
            return redirect('sharks/create')
                ->withErrors($validator)
                ->withInput($request->all());
        }else{
            Shark::create($validator->validated());
            return redirect('sharks')->with('message','Successfully created shark!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Shark $shark)
    {
        return view('sharks.show')->with(compact('shark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shark $shark)
    {
        return view('sharks.edit')->with(compact('shark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shark $shark)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'email' => ['required','email'],
            'shark_level' => ['required','numeric']
        ]);

        if($validator->fails()){
            return redirect('sharks.edit')
                ->withErrors($validator)
                ->withInput($request->all());
        }else{
            $shark->update($validator->validated());
            return redirect('sharks')->with('message','Successfully updated shark!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shark $shark)
    {
        $shark->delete();

        return redirect('sharks')->with('message','Successfully deleted the shark!');
    }
}
