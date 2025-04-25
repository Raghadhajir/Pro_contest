<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProblemResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    use GeneralTrait;

    public function getproblems()
    {
        $score = auth()->user()->score;
        if ($score < 20) {
            $level = 'beginner';
        } elseif ($score <= 40) {
            $level = 'medium';
        } else {
            $level = 'advanced';
        }
        $problems = Problem::where('level', $level)->get();
        $data = ProblemResource::collection($problems);
        return $this->apiResponse($data);

    }
    public function Problem($id)
    {
        $city = Problem::where('uuid', '=', $id)->first();
        $data=ProblemResource::make($city);
        return $this->apiResponse($data);

    }



}
