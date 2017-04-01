<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\News;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // functions about users
    public function showAllUsers()
    {
        $users = User::paginate(30);
        return view('admin.users')->with('users', $users);
    }

    public function destroyUser(User $user)
    {
        $result = $user->delete();
        $notification = null;
        if ($result) {
            $notification = ['toasterMsg' => "Successfully Deleted User: " . $user->username,
                'alert-type' => 'success'];
        } else {
            $notification = ['toasterMsg' => "Failed to Delete User: " . $user->username,
                'alert-type' => 'error'];
        }
        return redirect()->route('admin.users')->with($notification);
    }

    // functions about posts
    public function showAllPosts()
    {
        $posts = Post::paginate(30);
        return view('admin.posts')->with('posts', $posts);
    }

    public function viewPost(Post $post)
    {
        return redirect()->route('post.view', $post);
    }

    public function clearUnpublished()
    {
        $postCount = count(Post::where('published', 0)->get());
        $notification = null;

        if ($postCount == 0) {
            $notification = ['toasterMsg' => "No Unpublished Post to Delete",
                'alert-type' => 'warning'];
        } else {
            $result = Post::where('published', 0)->delete();
            if ($result) {
                $notification = ['toasterMsg' => "Successfully Deleted Unpublished Posts",
                    'alert-type' => 'success'];
            } else {
                $notification = ['toasterMsg' => "Failed to Deleted Unpublished Posts",
                    'alert-type' => 'error'];
            }
        }

        return redirect()->route('admin.posts')->with($notification);
    }

    // functions about news
    public function showAllNews()
    {
        $news = News::paginate(30);
        return view('admin.news')->with('news', $news);
    }

    public function createNews()
    {
        $news = new News([
            'user_id' => null,
            'title' => null,
            'content' => null,
            'published' => 0,
            'imgPath' => null
        ]);
        $news->save();
        return view('admin.createNews', compact('news'));
    }

    public function publishNews(Request $request)
    {
        $news = News::find($request->newsId);
        $result = $news->update([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->input('content'),
            'published' => 1,
            'imgPath' => null
        ]);

        $notification = null;
        if ($result) {
            $notification = ['toasterMsg' => "Successfully Published News: " . $news->title,
                'alert-type' => 'success'];
        } else {
            $notification = ['toasterMsg' => "Failed to Publish News: " . $news->title,
                'alert-type' => 'error'];
        }
        return redirect()->route('admin.news')->with($notification);
    }

    public function editNews(News $news)
    {
        return view('admin.editNews')->with('news', $news);
    }

    public function updateNews(Request $request, News $news)
    {
        $result = $news->update([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->input('content'),
            'published' => 1,
            'imgPath' => null
        ]);

        $notification = null;
        if ($result) {
            $notification = ['toasterMsg' => "Successfully Updated News: " . $news->title,
                'alert-type' => 'success'];
        } else {
            $notification = ['toasterMsg' => "Failed to Update News: " . $news->title,
                'alert-type' => 'error'];
        }
        return redirect()->route('admin.news')->with($notification);
    }

    public function destroyNews(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news');
    }

    public function clearUnpublishedNews()
    {
        $newsCount = count(News::where('published', 0)->get());
        $notification = null;

        if ($newsCount == 0) {
            $notification = ['toasterMsg' => "No Unpublished News to Delete",
                'alert-type' => 'warning'];
        } else {
            $result = News::where('published', 0)->delete();
            if ($result) {
                $notification = ['toasterMsg' => "Successfully Deleted Unpublished News",
                    'alert-type' => 'success'];
            } else {
                $notification = ['toasterMsg' => "Failed to Deleted Unpublished News",
                    'alert-type' => 'error'];
            }
        }

        return redirect()->route('admin.news')->with($notification);
    }
}
