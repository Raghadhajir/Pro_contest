<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegisterResource;
use Illuminate\Http\Request;
use App\Http\Resources\LoginResource;
use App\Http\Traits\GeneralTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use GeneralTrait;
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
             $error=$validator->errors()->first();
             return $this->apiResponse(null,false,$error,400);
        }
        $user = User::where('email', '=', $request->email)->first();
// dd($user);
        if (!$user) {
            $error = 'your email  not found';
            return $this->apiResponse(null, false, $error, 404);
        }

        if (Hash::check($request->password, $user->password)) {
            $data["user"] = LoginResource::make($user);
            $token = $user->createToken('customer')->plainTextToken;
            $data["token"] = $token;
            return $this->apiResponse($data);
        } else {
            $error = 'your password or email not correct';
            return $this->apiResponse(null, false, $error);
        }
    }
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                "required",
                "email",
                "max:255",
            ],
            'password' => 'required|string|min:8|max:15',
            'phone' => 'nullable|string|max:15',
            'birthday' => 'required|string',
            'college' => 'nullable',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
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
        if (!User::where('email', $request->email)) {
            $user = User::create([
                'name' => $request->name,
                'password' => Hash::make("$request->password"),
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => $image,
                'birthday' => $request->birthday,
                'college' => $request->college,
            ]);
            if ($user) {
                $data[] = RegisterResource::make($user);
                return $this->apiResponse($data);
            }

        } else {
            return $this->apiResponse(null, false, 'this email has already token', 200);

        }

    }
}
