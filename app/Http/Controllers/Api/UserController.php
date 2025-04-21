<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoachResource;
use App\Http\Resources\UserResource;
use App\Http\Traits\GeneralTrait;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use GeneralTrait;
    public function userProfile()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        // dd($user->uuid);
        $data['user'] = UserResource::make($user);
        return $this->apiResponse($data);

    }
    public function coachProfile()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->where('is_coach', 1)->first();
        // dd($user->uuid);
        $data['coach'] = CoachResource::make($user);
        return $this->apiResponse($data);

    }
}
