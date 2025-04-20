<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegisterResource;
use App\Http\Traits\GeneralTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use GeneralTrait;
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
            $image=env('PATH_IMG') . $show;
        } else {
            $image = null;
        }
        $user = User::create([
            'name' => $request->name,
            'password' =>  Hash::make("$request->password"),
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image,
            'birthday' => $request->birthday,
            'college' => $request->college,
        ]);
        if($user){
            $data[] = RegisterResource::make($user);
            return $this->apiResponse($data);

        }

    }
}
