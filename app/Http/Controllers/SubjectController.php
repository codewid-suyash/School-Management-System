<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('subject.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);
        // Create a new subject
        Subject::create($request->all());

        return redirect()->route('subject.read')->with('success', 'Subject created successfully.');
    }
    public function read()
    {
        $subjects = Subject::latest()->get();
        return view('subject.list', compact('subjects'));
    }
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.edit', compact('subject'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $subject = Subject::findOrFail($id);
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->update();
        

        return redirect()->route('subject.read')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subject.read')->with('success', 'Subject deleted successfully.');
    }
}
