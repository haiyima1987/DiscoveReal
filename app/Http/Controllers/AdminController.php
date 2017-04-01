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
        $user->delete();
        return redirect()->route('admin.users');
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
        return view('admin.news.create', compact('news'));
    }

    public function publishNews(Request $request)
    {
        $news = new News([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->input('content'),
            'published' => 1,
            'imgPath' => null
        ]);
        $news->save();
        return redirect()->route('admin.news');
    }

    public function editNews(News $news)
    {

    }

    public function updateNews()
    {

    }

    public function destroyNews(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news');
    }
}
