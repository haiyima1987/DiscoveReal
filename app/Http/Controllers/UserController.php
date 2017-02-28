<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showSignup()
    {
        return view('pages.signup');
    }

    public function signUpUser(SignupRequest $request)
    {
        $user = new User([
            'role_id' => 1,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'photo' => $request->photo,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country
        ]);

        if ($user->save()) {
            Auth::login($user);

            return view('pages.profile', compact('user'));
        } else {
            return view('pages.signup');
        }
    }

    public function showLogin()
    {
        return view('pages.login');
    }

    public function logInUser(LoginRequest $request)
    {
        $login = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$login => $request->input('login')]);

        if (Auth::attempt($request->only($login, 'password'))) {
            $user = Auth::User();
/*            $table->integer('role_id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->date('birthday');
            $table->char('gender');
            $table->string('city');
            $table->string('country');*/
            Session::put('user', $user);
            return view('pages.profile', compact('user'));
        } else {
            $error = [];
            if (User::where($login, $request->login)->first()) {
                $error->password = 'Password incorrect';
            } else {
                $error->login = 'Username or email incorrect';
            }
            return redirect()->back()->with(['login' => $request->login])->withErrors($error);
        }
    }

    public function logOutUser(){
        Auth::logout();
        return redirect()->route('countries');
    }

    public function showProfile()
    {
        $user = Session::has('user') ? Session::get('user') : null;
        return view('pages.profile', compact('user'));
    }
}
