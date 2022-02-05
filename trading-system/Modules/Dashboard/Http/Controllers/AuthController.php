<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    protected $guard = 'dashboard';
    protected $redirectTo = '/dashboard';
    protected $loginPath = '/dashboard/login';

    public function __construct()
    {
        $this->redirectTo = '/dashboard';
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:dashboards',
            'password' => 'required|min:6|confirmed',
        ]);
    }


    public function login()
    {
        //Auth::shouldUse('dashboard');

        if (auth()->check()) {
            return redirect('/dashboard');
        }

        return view('dashboard::pages.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $dashboard = User::where('email', $request->email)->first();

        if (!$dashboard) {
            return redirect($this->loginPath)->with('error', 'Admin bulunamadi.');
        }

        if (Hash::check($request->password, $dashboard->password)) {
            Auth::login($dashboard);
            return redirect('/dashboard');
        }

        return redirect($this->loginPath)
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'Incorrect email address or password']);

//        $user = [
//                    'email'    => $request->email,
//                    'password' => $request->password,
//                ];
//
//        if (auth()->attempt($user, $request->filled('remember'))) {
//            return redirect()->to('/Admin');
//        } else {
//            return redirect()->back();
//        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/dashboard/login');
    }
}
