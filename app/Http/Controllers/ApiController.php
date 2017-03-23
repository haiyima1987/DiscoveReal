<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showPost($id = null)
    {
        if ($id) {
            $post = Post::find($id);
            return $post->toJson();
        } else {
            return Post::all()->toJson();
        }
    }

    public function showUser($id = null)
    {
        if ($id) {
            $user = User::find($id);
            return $user->toJson();
        } else {
            return User::all()->toJson();
        }
    }

    public function storePost(Request $request)
    {
        $post = new Post([
            'user_id' => $request->userId,
            'title' => $request->title,
            'content' => $request->input('content'),
            'rate' => null,
            'location_id' => $request->locationId,
            'category_id' => $request->categoryId
        ]);

        if ($post->save()) {
            return response()->json(['success' => true, 'message' => 'Post saved successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed saving post'], 200);
        }
    }

    public function storeUser(Request $request)
    {
        $user = new User([
            'role_id' => $request->roleId,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'photo' => null,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country
        ]);

        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'Uer saved successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed saving user'], 200);
        }
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $result = $user->update([
            'role_id' => $request->roleId,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'photo' => null,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country
        ]);

        if ($result) {
            return response()->json(['success' => true, 'message' => 'User updated successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed updating user'], 200);
        }
    }

    public function destroyUser($id)
    {
        $result = User::destroy($id);

        if ($result) {
            return response()->json(['success' => true, 'message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed deleting user'], 200);
        }
    }
}
