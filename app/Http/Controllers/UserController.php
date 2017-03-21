<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function showSignup()
    {
        return view('page.signup');
    }

    public function signUpUser(SignupRequest $request)
    {
        $user = new User([
            'role_id' => 1,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'photo' => $request->photo,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country
        ]);

        if ($user->save()) {
            Auth::login($user);
            Session::put('id', $user->id);
            return view('user.profile', compact('user'));
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
            $user = Auth::User();
            // any specific info??
            Session::put('id', $user->id);
            return redirect()->route('user.viewProfile');
        } else {
            $error = [];
            $error['msg'] = 'Username, email, or password incorrect';
//            $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
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
        $posts = $user->posts;
        return view('user.userPosts', compact('user', 'posts'));
    }

    public function viewProfile()
    {
        $id = Session::has('id') ? Session::get('id') : null;
        $user = User::find($id);
        $posts = $user->posts;
        return view('user.profile', compact('user', 'posts'));
    }

    public function updateProfileImage(Request $request, User $user)
    {
        $this->validate($request, [
            'photo' => 'required|image|max:512|mimes:jpeg,jpg,bmp,png',
        ]);

        // get file and define name then resize
        $img = $request->file('photo');
        $name = time() . '.' . $img->getClientOriginalExtension();
        $resizedImg = Image::make($img)->resize(250, 250);

        $watermark = Image::make(public_path('img/watermark.png'))->resize(240, 60);
        $resizedImg->insert($watermark, 'bottom-right', 0, 0);

        // first delete old picture
        if ($user->photo) {
            $oldFilePath = 'public/img/users/' . $user->getOriginal()['photo'];
            Storage::delete($oldFilePath);
        }

        // then store new picture
        $storagePath = 'public/img/users/' . $name;
        $saveRes = Storage::put($storagePath, $resizedImg->stream());

        if ($saveRes) {
            $updateRes = $user->update(['photo' => $name]);
            if ($updateRes) {
                return response()->json([
                    'success' => true,
                    // attention!!!! here you must return a url to the view!!!!
                    // DO NOT quote
                    'filePath' => url($user->photo)
//                    'filePath' => $name
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'msg' => 'Failed to update image'
                ], 200);
            }
//            return redirect()->route('user.profile');
//            return $resizedImg->response();
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'Failed to save image'
            ], 200);
        }
    }

    public function editProfile()
    {
        $id = Session::has('id') ? Session::get('id') : null;
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
            'firstName' => 'required',
            'lastName' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        $id = Session::has('id') ? Session::get('id') : null;
        $user = User::find($id);
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
            return redirect()->route('user.viewProfile');
        } else {
            return view('page.signup');
        }
    }
}
