<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Http\Requests\PostRequest;
use App\Location;
use App\Photo;
use App\Post;
use App\User;
//use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function createPost()
    {
        $this->authorize('create', Post::class);

        $categories = Category::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');
        return view('posts.create', compact('countries', 'categories'));
    }

    public function publishPost(PostRequest $request)
    {
        $this->authorize('create', Post::class);

        $attraction = strtolower($request->attraction);
        $address = strtolower($request->address);
        $city = strtolower($request->city);
        $countryId = $request->country;
        $locationId = $this->getLocationId($attraction, $address, $city, $countryId);

        $userId = Session::get('id');
        $post = new Post([
            'user_id' => $userId,
            'title' => strtolower($request->title),
            'content' => Purifier::clean($request->postContent),
            'rate' => null,
            'location_id' => $locationId,
            'category_id' => $request->category
        ]);

        if ($post->save()) {
            $counter = 0;

            foreach ($request->file('photos') as $photo) {
                $name = time() . $counter . '.' . $photo->getClientOriginalExtension();
                $imgPath = Storage::putFileAs('storage/img/posts', $photo, $name);
                $photo = new Photo([
                    'post_id' => $post->id,
                    'imgPath' => $imgPath
                ]);

                $result = $photo->save();
                if (!$result) {
                    $errors = ['file' => 'Error saving file'];
                    return redirect()->back()->withErrors($errors);
                }
                $counter++;
            }

            return redirect()->route('post.view', $post);
        } else {
            $errors = ['post' => 'Error saving post'];
            return redirect()->back()->withErrors($errors);
        }
    }

    public function viewPost(Post $post)
    {
        $comments = $post->comments;
        $photos = $post->photos;
//        $user = User::find($post->user_id);
        $id = Session::has('id') ? Session::get('id') : null;
        $user = User::find($id);
        return view('posts.view', compact('post', 'comments', 'photos', 'user'));
    }

    public function editPost(Post $post)
    {
        $this->authorize('update', $post);
//        abort_unless(Gate::allows('update', $post), 403);

        $categories = Category::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');
        $category = Category::find($post->category_id);
        $location = Location::find($post->location_id);
        $country = Country::find($location->country_id);
        return view('posts.edit', compact('post', 'location', 'categories', 'category', 'countries', 'country'));
    }

    public function updatePost(PostRequest $request, Post $post)
    {
        abort_unless(Gate::allows('update', $post), 403);

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
    }

    public function removePost(Post $post)
    {
        $this->authorize('delete', $post);

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
        $comments = $post->comments;
        $photos = $post->photos;
//        $user = User::find($post->user_id);
//        $id = Session::has('id') ? Session::get('id') : null;
//        $user = User::find($id);
        $pdf = PDF::loadView('posts.viewToPdf', compact('post', 'comments', 'photos'));
        return $pdf->download('download.pdf');
//        return view('posts.viewToPdf', compact('post', 'comments', 'photos'));
    }
}
