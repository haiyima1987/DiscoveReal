<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\News;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllUsers()
    {
        //
        return view('admin.users')
            ->with('peoples', User::get());
    }
    public function showAllPosts()
    {
        //
        return view('admin.posts')
            ->with('posts', Post::get());
    }
    public function showEditPosts($id)
    {
        //
        return view('admin.posts')
            ->with('posts', Post::where('user_id',$id)->get());
    }

    public function showAllNews()
    {
        return view('admin.news')->with('newss', News::get());
    }
public function crNews(){
        return view("admin.crNews");
}


    public function createNews()
    {
        $this->authorize('create', News::class);

        $news = new News([
            'user' => null,
            'title' => null,
            'content' => null,
            'imgPath' => null
        ]);
        $news->save();
//        dd($news);
        return view('admin.create', compact('news'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $u = User::find($id);
        $u->delete();
        return redirect('/admin');
    }
    public function destroyP($id)
    {
        //
        $u = Post::find($id);
        $u->delete();
        return redirect('/admin/posts');
    }
    public function destroyN($id)
    {
        //
        $u = News::find($id);
        $u->delete();
        return redirect('/admin/news');
    }
}
