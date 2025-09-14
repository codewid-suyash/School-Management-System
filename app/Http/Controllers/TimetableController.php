<?php

namespace App\Http\Controllers;

use App\Models\AssignSubjectToClass;
use App\Models\Classes;
use App\Models\Days;
use App\Models\Subject;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $data['classes'] = Classes::all();
        $data['subjects'] = Subject::all();
        $data['days'] = Days::all();
        return view('timetable.create', $data);
    }
    public function store(Request $request)
    {
        $class_id = $request->class_id;
        $subject_id = $request->subject_id;

        foreach ($request->timetable as $timetable) {
            $day_id = $timetable['day_id'];
            $start_time = $timetable['start_time'];
            $end_time = $timetable['end_time'];
            $room_no = $timetable['room_no'];
            if ($day_id && $start_time && $end_time && $room_no) {
                Timetable::updateOrCreate(
                    [
                        'class_id' => $class_id,
                        'day_id' => $day_id,
                        'subject_id' => $subject_id,
                    ],
                    [
                        'class_id' => $class_id,
                        'day_id' => $day_id,
                        'subject_id' => $subject_id,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                        'room_no' => $room_no,
                    ]
                );
            }
        }
        return redirect()->route('timetable.read')->with('success', 'Timetable entry created successfully.');
    }

    public function read(Request $request)
    {
        $data['timetables'] = Timetable::with(['class', 'subject', 'day']);
        $data['subjects'] = [];

        if ($request->class_id) {
            $data['timetables']->where('class_id', $request->class_id);
            $data['subjects'] = AssignSubjectToClass::with('subject')->where('class_id', $request->class_id)->get();
        }
        if ($request->subject_id) {
            $data['timetables']->where('subject_id', $request->subject_id);
        }

        $data['timetables'] = $data['timetables']->get();
        $data['classes'] = Classes::all();

        return view('timetable.list', $data);
    }

    public function destroy($id)
    {
        $timetable = Timetable::find($id);

            $timetable->delete();
            return redirect()->back()->with('success', 'Timetable entry deleted successfully.');
    }
}
