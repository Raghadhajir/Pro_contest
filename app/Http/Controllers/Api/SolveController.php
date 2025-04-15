<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SolveResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Participant;
use App\Models\Problem;
use App\Models\Solve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SolveController extends Controller
{
    use GeneralTrait;
    public function uploadsolve(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'solve_file' => 'required|file|mimes:pdf|max:2048',
            'problem_id' => 'required|exists:problems,uuid',

        ]);
        if ($validate->fails()) {
            $error = $validate->errors()->first();
            return $this->apiResponse(null, false, $error, 400);
        }
        $userid = auth()->user()->id;
        $d = $request->file('solve_file')->store('files', 'public');
        // dd($participant->id);
        $solve = Solve::create([
            'user_id' => $userid,
            'problem_id' => Problem::where('uuid', $request->problem_id)->pluck('id')->first(),
            'file' => $d,
        ]);
        if ($solve) {
            $data['solve'] = SolveResource::make($solve);
            return $this->SuccessResponse($data);
        } else {
            return $this->apiResponse(null, false, 'upload not success', 200);
        }
    }
}
