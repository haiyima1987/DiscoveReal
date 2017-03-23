<?php

namespace App\Http\Controllers;

use App\Country;
use App\Location;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('page.home');
    }

    public function showAboutUs()
    {
        return view('page.aboutUs');
    }

    public function showCountries($id = null)
    {
        if (!$id) {
            $countries = Country::all();
            $postCount = [];

            foreach ($countries as $country) {
                $postCount[$country->id] = 0;
                foreach ($country->locations as $location) {
                    $postCount[$country->id] += count($location->posts);
                }
            }

            return view('page.countries', compact('countries', 'postCount'));
        } else {
            $country = Country::find($id);
            $allPosts = [];

            foreach ($country->locations as $location) {
                foreach ($location->posts as $post) {
                    array_push($allPosts, $post);
                }
            }

            return view('post.countryPosts', compact('allPosts', 'country'));
        }
    }
}
