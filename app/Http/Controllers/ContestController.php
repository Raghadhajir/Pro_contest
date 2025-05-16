<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function create()
    {
        return view('date.add_date'); // إذا غير اسم الملف عدّله هون
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'register_availability' => 'required|boolean',
        ]);

        Contest::create([
            'uuid' => \Str::uuid(), // Laravel 8+ يفضل استخدام Str::uuid()
            'name' => $request->name,
            'date' => $request->date,
            'register_availability' => $request->register_availability,
        ]);

        return redirect()->route('all_date')->with('success', 'Contest created successfully!');
    }


    public function index()
{
    // الحصول على آخر مسابقة تم إضافتها
    $contest = Contest::orderBy('id', 'desc')->first();
    if ($contest) {
        // تحقق إذا كانت المسابقة قد انتهت
        $contestDate = Carbon::parse($contest->date);

        if ($contestDate->isPast()) { // تحقق إذا كان التاريخ قد مر
            $contest->register_availability = 0;
            $contest->save(); // حفظ التغيير في قاعدة البيانات
        }
    }

    // جلب الفرق المرتبطة بالمسابقة
    $teams = Team::with('users')
                ->where('contest_id', $contest?->id)
                ->get();

    return view('date.all_date', compact('contest', 'teams'));
}

    // $contest = Contest::orderBy('id', 'desc')->first();

}