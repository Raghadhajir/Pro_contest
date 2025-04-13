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
        $participant = Participant::where('participant_id', $userid)->first();
        if ($participant) {
            $problemId = Problem::where('uuid', $request->problem_id)->first();
            $contestId = $problemId->contest_id;
            $contestId2 = $participant->contest_id;
            if ($contestId == $contestId2) {
                $coach = User::where('id', $userid)->first();
                if ($coach->is_coach == 1) {
                    $participantId = $coach->team_id;
                } else {
                    $participantId = $userid;
                }
                // dd($participantId);

            } else {
                return $this->apiResponse(null, false, 'لست مشترك بالمسابقة', 200);

            }
        } else {
            return $this->apiResponse(null, false, 'لست مشترك بالمسابقة', 200);
        }


        $d = $request->file('solve_file')->store('files', 'public');
        // dd($participant->id);
        $solve = Solve::create([
            'participant_id' => $participant->id,
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
