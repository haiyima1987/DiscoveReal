<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;

class ApiController extends Controller
{
    // api functions about users
    public function showUser($id = null)
    {
        if ($id) {
            $user = User::find($id);
            return $user->toJson();
        } else {
            return User::all()->toJson();
        }
    }

    // the correct way to do it????
    // retrieve the api token and save it????
    public function storeUser(Request $request)
    {
        $user = new User([
            'role_id' => 2,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'photo' => null,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country,
        ]);

        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'User saved successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed saving user'], 200);
        }
    }

    public function updateUser(Request $request, $id)
    {
        $userId = Auth::guard('api')->id();

        if ($userId == $id) {
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
        } else {
            return response()->json(['success' => false, 'message' => 'User not found'], 200);
        }
    }

    public function destroyUser($id)
    {
        $userId = Auth::guard('api')->id();

        if ($userId == $id) {
            $result = User::destroy($id);

            if ($result) {
                return response()->json(['success' => true, 'message' => 'User deleted successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed deleting user'], 200);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'User not found'], 200);
        }
    }

    // api functions about posts
    public function showPost($id = null)
    {
        if ($id) {
            $post = Post::find($id);
            return $post->toJson();
        } else {
            return Post::all()->toJson();
        }
    }

    public function storePost(Request $request)
    {
        $post = new Post([
            'user_id' => Auth::guard('api')->id(),
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

    public function updatePost(Request $request, $id)
    {
        $userId = Auth::guard('api')->id();

        $post = Post::where([
            ['id' => $id],
            ['user_id' => $userId]
        ])->get();

        if ($post) {
            $result = $post->update([
                'user_id' => $userId,
                'title' => strtolower($request->title),
                'content' => Purifier::clean($request->postContent),
                'rate' => null,
                'location_id' => $request->locationId,
                'category_id' => $request->category,
                'published' => 1
            ]);

            if ($result) {
                return response()->json(['success' => true, 'message' => 'Post updated successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed updating post'], 200);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Post not found'], 200);
        }
    }

    public function destroyPost($id)
    {
        $userId = Auth::guard('api')->id();

        $post = Post::where([
            ['id' => $id],
            ['user_id' => $userId]
        ])->get();

        if ($post) {
            $result = Post::destroy($id);

            if ($result) {
                return response()->json(['success' => true, 'message' => 'Post deleted successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed deleting post'], 200);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Post not found'], 200);
        }
    }
}
