<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContestResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    use GeneralTrait;
    public function DateContest(){
        $contest=Contest::all();
        // dd($contest);
        $data = ContestResource::collection($contest);
        return $this->apiResponse($data);
    }
}
