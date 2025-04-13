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
        $problems = Problem::all();
        $data = ProblemResource::collection($problems);
        return $this->apiResponse($data);
;
    }
    // public function city($id)
    // {
    //     $city = City::where('uuid', '=', $id)->first();
    //     $data=CityResource::make($city);
    //     return $this->apiResponse($data);

    // }



}
