<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Team;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // $students = User::where('is_coach',0)->get();
        $students = User::all();
        $courses = Course::all();
        return view('panel.dashboard.student.show',['students'=>$students,'courses'=>$courses]);
    }
    public function addStudent(Request $request)
    {
        $teams = Team::all();
        return view('panel.dashboard.student.add',['teams' => $teams]);
    }
    public function studentAdd(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string',
                'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
                'birthday' => 'required|date',
                'college' => 'required|string',
                'is_coach' => 'required|in:0,1',
                'score' => 'required|string',
                'image' => 'required|image|mimes:png,jpg,jpeg,webp',
                'team_id' => 'required|string|exists:teams,id'
        ]);
        if($validator->fails())
        {
            return back()->withInput($request->all())->withErrors($validator);
        }
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/user/';
            $file->move($path,$filename);
        }
        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'college' => $request->college,
                'is_coach' => $request->is_coach,
                'score' => $request->score,
                'image' => $path.$filename,
                'team_id' => $request->team_id,
        ]);
        return redirect()->route('student');
    }
    public function editStudent($id,Request $request)
    {
        $teams = Team::all();
        $student = User::find($id);
        return view('panel.dashboard.student.edit',['teams'=>$teams,'student'=>$student]);
    }
    public function studentEdit($id,Request $request)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'birthday' => 'required|date',
            'college' => 'required|string',
            'is_coach' => 'required|in:0,1',
            'score' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
            'team_id' => 'required|string|exists:teams,id'
        ]);
        if ($validator->fails())
        {
            return back()->withInput($request->all())->withErrors($validator);
        }
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/user/';
            $file->move($path,$filename);
            if(File::exists($user->image)){
                File::delete($user->image);
            }
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'college' => $request->college,
            'is_coach' => $request->is_coach,
            'score' => $request->score,
            'image' => $path.$filename,
            'team_id' => $request->team_id,
        ]);

        return redirect()->route('student');
    }
    public function delete(Request $request)
    {
        $student =User::find($request->id);
        if(File::exists($student->image)){
            File::delete($student->image);
        }
        $student->delete();
        return redirect()->route('student');
    }
}
