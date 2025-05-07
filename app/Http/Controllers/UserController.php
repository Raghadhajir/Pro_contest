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
    public function showStudent()
    {
        $students = User::where('is_coach',0)->get();
        return view('panel.dashboard.student.show',['students'=>$students]);
    }
    public function coachShow()
    {
        $coaches = User::where('is_coach',1)->get();
        return view('panel.dashboard.coach.show',['coaches' => $coaches]);
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
                'is_coach' => 'nullable|string',
                'score' => 'required|string',
                'image' => 'required|image|mimes:png,jpg,jpeg,webp',
                'team_id' => 'nullable|string'
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
                'is_coach' => 0,
                'score' => $request->score,
                'image' => $path.$filename,
                // 'team_id' => $request->team_id ?:null,
        ]);
        return redirect()->route('student');
    }
    public function addCoach(Request $request)
    {
        $teams = Team::all();
        return view('panel.dashboard.coach.add',['teams' => $teams]);
    }
    public function coachAdd(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'birthday' => 'required|date',
            'college' => 'required|string',
            'is_coach' => 'nullable|string',
            'score' => 'nullable|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
            'team_id' => 'nullable|string'
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
            'is_coach' => 1,
            'image' => $path.$filename,
            // 'team_id' => $request->team_id,
    ]);
    return redirect()->route('coach');
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
            'is_coach' => 'nullable|string',
            'score' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
            'team_id' => 'nullable|string'
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
            'is_coach' => 0,
            'score' => $request->score,
            'image' => $path.$filename,
            // 'team_id' => $request->team_id,
        ]);

        return redirect()->route('student');
    }
    public function editCoach($id,Request $request)
    {
        $teams = Team::all();
        $coach = User::find($id);
        return view('panel.dashboard.coach.edit',['teams'=>$teams,'coach'=>$coach]);
    }
    public function coachEdit($id,Request $request)
    {
        $coach = User::find($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'birthday' => 'required|date',
            'college' => 'required|string',
            'is_coach' => 'nullable|string',
            'score' => 'nullable|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
            'team_id' => 'nullable|string'
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
            if(File::exists($coach->image)){
                File::delete($coach->image);
            }
        }
        $coach->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'college' => $request->college,
            'is_coach' => 1,
            'image' => $path.$filename,
            // 'team_id' => $request->team_id,
        ]);

        return redirect()->route('coach');
    }
    public function studentDelete(Request $request)
    {
        $student =User::find($request->id);
        if(File::exists($student->image)){
            File::delete($student->image);
        }
        $student->delete();
        return redirect()->route('student');
    }
    public function coachDelete(Request $request)
    {
        $coach =User::find($request->id);
        if(File::exists($coach->image)){
            File::delete($coach->image);
        }
        $coach->delete();
        return redirect()->route('coach');
    }
}
