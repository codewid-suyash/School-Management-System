<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('announcement.form');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'message' => 'required|string|max:255',
            'type' => 'required|in:teacher,student,parent',
        ]);

        // Create a new announcement
       $announcement = new Announcement();
        $announcement->message = $request->message;
        $announcement->type = $request->type;
        $announcement->save();

        // Redirect back with success message
        return redirect()->route('announcement.create')->with('success', 'Announcement created successfully.');
    }
    public function read()
    {
        $announcements = Announcement::latest()->get();
        return view('announcement.list', compact('announcements'));
    }
    public function edit(Announcement $announcement,$id)
    {
        $announcement = Announcement::findOrFail($id);
        // Return the edit view with the announcement data
        return view('announcement.edit', compact('announcement'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'message' => 'required',
            'type' => 'required',
        ]);
        // Find the announcement by ID
        $announcement = Announcement::findOrFail($id);
        // Update the announcement
        $announcement->message = $request->message;
        $announcement->type = $request->type;
        $announcement->update();

        // Redirect back with success message
        return redirect()->route('announcement.read')->with('success', 'Announcement updated successfully.');
    }

    public function destroy($id)
    {
        // Find the announcement by ID
        $announcement = Announcement::findOrFail($id);
        // Delete the announcement
        $announcement->delete();

        // Redirect back with success message
        return redirect()->route('announcement.read')->with('success', 'Announcement deleted successfully.');
    }
}
