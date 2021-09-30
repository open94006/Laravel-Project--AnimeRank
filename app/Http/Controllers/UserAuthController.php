<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        //Validate Requests
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:15'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $query = $user->save();

        if ($query) {
            return back()->with('success', '系統提示：註冊成功');
        } else {
            return back()->with('fail', '系統提示：發生錯誤');
        }
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' =>  'required|min:5|max:15'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUserId', $user->id);
                $request->session()->put('LoggedUserName', $user->name);
                return redirect('/');
            } else {
                return back()->with('fail', '系統提示：密碼有誤');
            }
        } else {
            return back()->with('fail', '系統提示：此帳號沒有註冊');
        }
    }

    public function profile()
    {
        if (session()->has('LoggedUserId')) {
            $user = User::where('id', '=', session('LoggedUserId'))->first();
            $data = [
                'LoggedUserInfo' => $user,
            ];
        }
        return $data;
    }

    public function logout()
    {
        if (session()->has('LoggedUserId')) {
            session()->pull('LoggedUserId');
            session()->pull('LoggedUserName');
            return redirect('/');
        }
    }
}