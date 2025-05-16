<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $coachs = User::where('is_coach',1)->get();
        $members = User::where('is_coach',0)->get();
        return view('panel.dashboard.team.show',['teams' => $teams,'coachs' => $coachs,'members' => $members]);
    }
    // public function addTeam(Request $request)
    // {
    //     $contests = Contest::all();
    //     return view('panel.dashboard.team.add',['contests'=>$contests]);
    // }
    // public function teamAdd(Request $request)
    // {
    //     $validator = Validator::make($request->all(),[
    //         'name' => 'required|string',
    //         'contest_id' => 'required|string|exists:contests,id'
    //     ]);
    //     if($validator->fails())
    //     {
    //         return back()->withInput($request->all())->withErrors($validator);
    //     }
    //     Team::create([
    //         'name' => $request->name,
    //         'contest_id' => $request->contest_id
    //     ]);
    //     return redirect()->route('team');
    // }
    public function delete(Request $request)
    {
        $team =Team::find($request->id);
        $team->delete();
        return redirect()->route('team');
    }
}
