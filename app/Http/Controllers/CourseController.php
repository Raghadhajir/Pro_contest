<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('panel.dashboard.course.show',['courses'=>$courses]);
    }
    public function addCourse(Request $request)
    {
        $students = User::where('is_coach',0)->get();
        return view('panel.dashboard.course.add',['students'=>$students]);
    }
    public function coursetAdd(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'user_id' => 'required|string|exists:users,id',
            'course_date' => 'required|date',
            'postponed_date' => 'required|date'
        ]);
        if($validator->fails())
        {
            return back()->withInput($request->all())->withErrors($validator);
        }
        Course::create([
            'name' => $request->name,
            'user_id' => $request->username,
            'course_date' => $request->course_date,
            'postponed_date' => $request->postponed_date
        ]);
        return redirect()->route('course');
    }
    public function delete(Request $request)
    {
        $course =Course::find($request->id);
        $course->delete();
        return redirect()->route('course');
    }
}
