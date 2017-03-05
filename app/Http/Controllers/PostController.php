<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Http\Requests\PostRequest;
use App\Location;
use App\Photo;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{
    public function createPost()
    {
        $categories = Category::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');
        return view('posts.create', compact('countries', 'categories'));
    }

    public function publishPost(PostRequest $request)
    {
        $attraction = strtolower($request->attraction);
        $address = strtolower($request->address);
        $city = strtolower($request->city);
        $countryId = $request->country;
        $locationId = $this->getLocationId($attraction, $address, $city, $countryId);

        $user = Session::get('user');
        $post = new Post([
            'user_id' => $user['id'],
            'title' => strtolower($request->title),
            'content' => Purifier::clean($request->postContent),
            'rate' => null,
            'location_id' => $locationId,
            'category_id' => $request->category
        ]);

        if ($post->save()) {
            $img = $request->file('photo');
            $name = $post->id . 'at' . time() . $img->getClientOriginalName();
            $imgPath = Storage::putFileAs('public/img/posts', $img, $name);
            $photo = new Photo([
                'post_id' => $post->id,
                'imgPath' => $imgPath
            ]);
            if ($photo->save()) {
                return redirect()->route('post.view', ['id' => $post->id]);
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('home');
        }
    }

    public function viewPost(Post $post)
    {
        $user = Session::has('user') ? Session::get('user') : null;
        return view('posts.view', compact('post', 'user'));
    }

    public function editPost(Post $post)
    {
        $categories = Category::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');
        $category = Category::find($post->category_id);
        $location = Location::find($post->location_id);
        $country = Country::find($location->country_id);
        return view('posts.edit', compact('post', 'location', 'categories', 'category', 'countries', 'country'));
    }

    public function updatePost(PostRequest $request, Post $post)
    {
        $attraction = strtolower($request->attraction);
        $address = strtolower($request->address);
        $city = strtolower($request->city);
        $countryId = $request->country;
        $locationId = $this->getLocationId($attraction, $address, $city, $countryId);

        $post->update([
            'title' => strtolower($request->title),
            'content' => clean($request->postContent),
            'location_id' => $locationId,
            'category_id' => $request->category
        ]);

        return redirect()->route('post.view', ['id' => $post->id]);
//        $user = Session::get('user');
//        $post = new Post([
//            'user_id' => $user['id'],
//            'title' => strtolower($request->title),
//            'content' => $request->postContent,
//            'rate' => null,
//            'location_id' => $locationId,
//            'category_id' => $request->category
//        ]);
//
//        if ($post->save()) {
//            $img = $request->file('photo');
//            $name = $post->id . 'at' . time() . $img->getClientOriginalName();
//            $imgPath = Storage::putFileAs('public/img/posts', $img, $name);
//            $photo = new Photo([
//                'post_id' => $post->id,
//                'imgPath' => $imgPath
//            ]);
//            if ($photo->save()) {
//                return redirect()->route('post.view', ['id' => $post->id]);
//            } else {
//                return redirect()->route('home');
//            }
//        } else {
//            return redirect()->route('home');
//        }
    }

    public function removePost(Post $post)
    {
        $posts = Post::find($post->location_id);
        if (count($posts) == 1) {
            Location::destroy($post->location_id);
        }
        $post->delete();
        return redirect()->route('user.profile');
    }

    // helper function -- get location id if it exists, create one if not
    private function getLocationId($attraction, $address, $city, $countryId)
    {
        $location = Location::where([
            ['name', $attraction],
            ['address', $address],
            ['city', $city],
            ['country_id', $countryId]
        ])->get(); // get the collection then get the value of id

        if (!$location) {
            $location = new Location([
                'name' => strtolower($attraction),
                'address' => strtolower($address),
                'city' => strtolower($city),
                'country_id' => $countryId
            ]);
            $location->save();
            return $location->id;
        }
        return $location->first()->id; // first() returns an object
    }
}
