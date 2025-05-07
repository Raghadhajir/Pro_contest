<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoachResource;
use App\Http\Resources\RegisterResource;
use App\Http\Resources\UserResource;
use App\Http\Traits\GeneralTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


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
    public function EditUserProfile(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => [
                "required",
                "email",
                "max:255",
            ],
            'password' => 'nullable|string|min:8|max:15',
            'phone' => 'nullable|string|max:15',
            'birthday' => 'nullable|string',
            'college' => 'nullable',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $studentid = auth()->user()->id;
        // dd($studentid);
        if ($validate->fails()) {
            $error = $validate->errors()->first();
            return $this->apiResponse(null, false, $error, 400);
        }
        if (isset($request->image)) {
            $show = $request->file('image')->store('image', 'public');
            $image = env('PATH_IMG') . $show;
        } else {
            $image = null;
        }
        // dd(User::where('email', $request->email)->get());
        $user = User::where('email', $request->email)->first();
        $student = User::where('id', $studentid)->first();

            $user = $student->update([
                'name' => $request->name,
                'password' => Hash::make("$request->password"),
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => $image,
                'birthday' => $request->birthday,
                'college' => $request->college,
            ]);
            if ($user) {
                $data = "updated user";
                return $this->apiResponse($data);
            }


    }
    public function EditCoachProfile(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => [
                "required",
                "email",
                "max:255",
            ],
            'password' => 'nullable|string|min:8|max:15',
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        // dd($studentid);
        if ($validate->fails()) {
            $error = $validate->errors()->first();
            return $this->apiResponse(null, false, $error, 400);
        }

        if (isset($request->image)) {
            $show = $request->file('image')->store('image', 'public');
            $image = env('PATH_IMG') . $show;
        } else {
            $image = null;
        }
        // dd(User::where('email', $request->email)->get());
        $user = User::where('email', $request->email)->first();
        $coachid = auth()->user()->id;
        $coach = User::where('id', $coachid)->first();
            $user = $coach->update([
                'name' => $request->name,
                'password' => Hash::make("$request->password"),
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => $image,
                'is_coach' => 1
            ]);
            if ($user) {
                $data = "updated coach";
                return $this->apiResponse($data);
            }

    }
}
