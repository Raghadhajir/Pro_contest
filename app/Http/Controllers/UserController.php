<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Problem;
use App\Models\Solve;
class UserController extends Controller
{
    public function index()
    {
        // تقسيم الطلاب حسب المستويات
        $students_0_20 = User::where('is_coach', false)->whereBetween('score', [0, 20])->orderByDesc('score')->take(3)->get();
        $students_20_40 = User::where('is_coach', false)->whereBetween('score', [20, 40])->orderByDesc('score')->take(3)->get();
        $students_40_60 = User::where('is_coach', false)->whereBetween('score', [40, 60])->orderByDesc('score')->take(3)->get();

        // الإحصائيات
        $totalStudents = User::where('is_coach', false)->count();
        $totalTeams = Team::count();
        $solvedProblems = Solve::distinct('problem_id')->count('problem_id'); // عدد المسائل المحلولة (غير مكررة)
        $totalProblems = Problem::count();

        return view('home.home_chart', compact(
            'students_0_20', 'students_20_40', 'students_40_60',
            'totalStudents', 'totalTeams', 'solvedProblems', 'totalProblems'
        ));
    }}