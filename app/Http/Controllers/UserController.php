<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\SignupRequest;
use App\Post;
use App\User;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showSignup()
    {
        return view('page.signup');
    }

    public function signUpUser(SignupRequest $request)
    {
        $user = new User([
            'role_id' => 2,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'photo' => null,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country,
            'api_token' => str_random(60)
        ]);

        if ($user->save()) {
            Auth::login($user);
            Session::put('id', $user->id);
            return redirect()->route('user.viewProfile');
        } else {
            return view('page.signup');
        }
    }

    public function showLogin()
    {
        return view('page.login');
    }

    public function logInUser(LoginRequest $request)
    {
        $login = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$login => $request->input('login')]);

        if (Auth::attempt($request->only($login, 'password'))) {
            return redirect()->route('user.viewProfile');
        } else {
            $error = [];
            $error['msg'] = 'Username, email, or password incorrect';
            return redirect()->back()->with(['login' => $request->login])->withErrors($error);
        }
    }

    public function logOutUser()
    {
        Auth::logout();
        Session::forget('id');
        return redirect()->route('countries');
    }

    public function viewAllPosts(User $user)
    {
        $posts = Post::where([
            ['published', 1],
            ['user_id', $user->id]
        ])->with('user')->paginate(20);

        return view('user.userPosts', compact('user', 'posts'));
    }

    public function viewProfile()
    {
        $user = Auth::user();
        $posts = Post::where([
            ['published', 1],
            ['user_id', Auth::id()]
        ])->with('user')->paginate(15);
        $threads = $this->getThreads();
        return view('user.profile', compact('user', 'posts', 'threads'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.editProfile', compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = Auth::user();

        $result = $user->update([
            'password' => bcrypt($request->password),
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country
        ]);

        if ($result) {
            $notification = ['toasterMsg' => "Successfully Updated Profile: " . $user->username,
                'alert-type' => 'success'];
            return redirect()->route('user.viewProfile')->with($notification);
        } else {
            $notification = ['toasterMsg' => "Failed to Update Profile: " . $user->username,
                'alert-type' => 'error'];
            return view('page.signup');
        }
    }

    public function getThreads()
    {
        // All threads, ignore deleted/archived participants
//        $threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
//         $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();
        return $threads;
    }
}
