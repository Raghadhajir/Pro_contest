<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;

class ProblemController extends Controller
{
    public function index()
    {
        $problems = Problem::withCount('solves')->get();
        return view('problem.all_problem', compact('problems'));
    }

    public function create()
    {
        return view('problem.add_problem');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx,zip',
            'level' => 'required|in:beginner,medium,advanced', // إضافة التحقق من المستوى
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/problems'), $filename);
        }

        Problem::create([
            'title' => $request->title,
            'description' => $request->description,
            'file' => $filename,
            'level' => $request->level, // حفظ المستوى
        ]);

        return redirect()->route('all_problem')->with('success', 'تمت إضافة المسألة بنجاح');
    }

    public function download($id)
    {
        $problem = Problem::findOrFail($id);
        $filePath = public_path('uploads/problems/' . $problem->file);
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return back()->with('error', 'الملف غير موجود');
        }
    }
}
