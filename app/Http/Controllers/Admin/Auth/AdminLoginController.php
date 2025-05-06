<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form()
    {

        return view('auth.login');
    }

    public function login(Request $request)
    {
// dd($request->UserMail,$request->password);
        $request->validate([
            'UserMail' => 'required',
            'password' => 'required',
        ]);

        $login = request()->input('UserMail');

        if(is_numeric($login)){
            $request['mobile'] = $login;
        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $request['email'] = $login;
        } else {
            $request['email'] = $login;
        }

        // $credentials = $request->except(['_token','remember','UserMail']);
        $credentials = [
            'email' => $request->UserMail,
            'password' => $request->password,
        ];
        if (auth()->guard('admin')->attempt($credentials)) {
            $user = Admin::where('email',$request->UserMail)->first();
            // dd($user);
            if($user){
                $this->redirectTo = '/admin-panel';
                return redirect()->route('Admin-Panel');
            }else{
                return redirect()->back()->withErrors(['email', 'Invalid credentials'])->withInput()->with('message', 'خطأ في الصلاحية');
            }

        }else{
            return redirect()->back()->withErrors(['email', 'Invalid credentials'])->withInput()->with('message', 'خطأ في البيانات');
        }
    }



    public function show_signup_form()
    {
        return view('auth.register');
    }

    public function process_signup(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = Admin::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('message', 'Your account is created');

        return redirect()->route('login');
    }


    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
