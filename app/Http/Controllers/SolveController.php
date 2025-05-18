<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solve;
use Carbon\Carbon;
$solvedProblems = Solve::distinct('problem_id')->count('problem_id');
class SolveController extends Controller
{

    public function index(Request $request)
    {
        $query = Solve::with(['user', 'problem']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $solves = $query->orderBy('created_at', 'desc')->get();

        return view('solve.all_solve', compact('solves'));
    }


    public function show(Solve $solve)
    {
        $solve->load(['user', 'problem']);
        return view('solve.one_solve', compact('solve'));
    }

    public function updateStatus(Request $request, Solve $solve)
    {
        $request->validate(['status' => 'required|in:accepted,process,reject,pending']);
        $solve->status = $request->status;
        $solve->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function destroy(Solve $solve)
    {
        $solve->delete();
        return back()->with('success', 'تم حذف السطر بنجاح');
    }

}