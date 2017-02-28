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

class PostController extends Controller
{
    public function createPost()
    {
        $categories = Category::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');
        return view('pages.post', compact('countries', 'categories'));
    }

    public function publishPost(PostRequest $request)
    {
        $attraction = $request->attraction;
        $address = $request->address;
        $city = $request->city;
        $countryId = $request->country;
        $locationId = $this->getLocationId($attraction, $address, $city, $countryId);

        $user = Session::get('user');
        $post = new Post([
            'user_id' => $user->role_id,
            'datetime' => Carbon::now(),
            'title' => $request->title,
            'content' => $request->postContent,
            'rate' => null,
            'location_id' => $locationId,
            'category_id' => $request->category
        ]);
        if ($post->save()) {
            $imgPath = Storage::putFileAs('img/posts', $request->file('photo'), $post->id);
            $photo = new Photo([
                'post_id' => $post->id,
                'imgPath' => $imgPath
            ]);
            if ($photo->save()) {
                return view('pages.home');
            } else {
                return view('pages.aboutUs');
            }
        } else {
            return view('pages.aboutUs');
        }
    }

    private function getLocationId($attraction, $address, $city, $countryId)
    {
        $locationId = Location::where([
            'name', $attraction,
            'address', $address,
            'city', $city,
            'country_id', $countryId
        ]);
        if (!$locationId) {
            $location = new Location([
                'name', $attraction,
                'address', $address,
                'city', $city,
                'country_id', $countryId
            ]);
            $location->save();
            $locationId = $location->id;
        }
        return $locationId;
    }
}
