<?php

namespace App\Http\Controllers;

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
    public function addTeam(Request $request)
    {
        return view('panel.dashboard.team.add');
    }
    public function teamAdd(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
        ]);
        if($validator->fails())
        {
            return back()->withInput($request->all())->withErrors($validator);
        }
        Team::create([
            'name' => $request->name,
        ]);
        return redirect()->route('team');
    }
    public function delete(Request $request)
    {
        $team =Team::find($request->id);
        $team->delete();
        return redirect()->route('team');
    }
}
