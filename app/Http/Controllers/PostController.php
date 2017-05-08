<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Http\Requests\PostRequest;
use App\Location;
use App\Post;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Gate;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{
    public function createPost()
    {
        $this->authorize('create', Post::class);

        $categories = Category::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');

        $userId = Auth::user()->id;
        $post = new Post([
            'user_id' => $userId,
            'title' => null,
            'content' => null,
            'rate' => null,
            'location_id' => null,
            'category_id' => null
        ]);
        $post->save();
        return view('post.createPost', compact('countries', 'categories', 'post'));
    }

    public function publishPost(PostRequest $request)
    {
        $post = Post::find($request->postId);
        $this->authorize('update', $post);

        $attraction = strtolower($request->attraction);
        $address = strtolower($request->address);
        $city = strtolower($request->city);
        $countryId = $request->country;
        $locationId = $this->getLocationId($attraction, $address, $city, $countryId);

        $userId = Auth::user()->id;
        $updateRes = $post->update([
            'user_id' => $userId,
            'title' => strtolower($request->title),
            'content' => Purifier::clean($request->input('content')),
            'rate' => null,
            'location_id' => $locationId,
            'category_id' => $request->category,
            'published' => 1
        ]);

        if ($updateRes) {
            $notification = ['toasterMsg' => "Successfully Published Post: " . ucwords($post->title),
                'alert-type' => 'success'];
            return redirect()->route('post.view', $post)->with($notification);
        } else {
            $errors = ['post' => 'Error saving post'];
            return redirect()->back()->withErrors($errors);
        }
    }

    public function viewPost(Post $post)
    {
        // fixed!! Added author and eager loading
        $comments = $post->comments->load('user');
        $photos = $post->photos;
        $author = $post->user;

        return view('post.viewPost', compact('post', 'comments', 'photos', 'author'));
    }

    public function editPost(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');
        $category = Category::find($post->category_id);
        $location = Location::find($post->location_id);
        $country = Country::find($location->country_id);

        return view('post.editPost',
            compact('post', 'location', 'categories', 'category', 'countries', 'country'));
    }

    public function updatePost(PostRequest $request, Post $post)
    {
        abort_unless(Gate::allows('update', $post), 403);

        $attraction = strtolower($request->attraction);
        $address = strtolower($request->address);
        $city = strtolower($request->city);
        $countryId = $request->country;
        $locationId = $this->getLocationId($attraction, $address, $city, $countryId);

        $updateRes = $post->update([
            'title' => strtolower($request->title),
            'content' => clean($request->input('content')),
            'location_id' => $locationId,
            'category_id' => $request->category
        ]);

        if ($updateRes) {
            $notification = ['toasterMsg' => "Successfully Updated Post: " . ucwords($post->title),
                'alert-type' => 'success'];
            return redirect()->route('post.view', $post)->with($notification);
        } else {
            $notification = ['toasterMsg' => "Failed to Update Post: " . ucwords($post->title),
                'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }
    }

    public function removePost(Post $post)
    {
        $this->authorize('delete', $post);

        $posts = Post::find($post->location_id);
        if (count($posts) == 1) {
            Location::destroy($post->location_id);
        }
        $post->delete();
        $notification = ['toasterMsg' => "Successfully Deleted Post: " . ucwords($post->title),
            'alert-type' => 'success'];
        return redirect()->route('user.viewProfile')->with($notification);
    }

    // helper function -- get location id if it exists, create one if not
    private function getLocationId($attraction, $address, $city, $countryId)
    {
        $location = Location::where([
            ['name', $attraction],
            ['address', $address],
            ['city', $city],
            ['country_id', $countryId]
        ])->get()->first(); // get the collection then get the value of id

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
        return $location->id; // first() returns an object
    }

    public function generatePdfFromView(Post $post)
    {
        // fixed!! Added author and eager loading
        $comments = $post->comments->load('user');
        $photos = $post->photos;
        $author = $post->user;
        $pdf = PDF::loadView('post.viewToPdf', compact('post', 'comments', 'photos', 'author'));
        return $pdf->download('download.pdf');
    }
}
