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
        return view('pages.home');
    }

    public function showAboutUs()
    {
        return view('pages.aboutUs');
    }

    public function showCountries($id = null)
    {
        if (!$id) {
            $countries = Country::all();
            $postCount = [];

            foreach ($countries as $country) {
                $postCount[$country->id] = 0;
                if ($locations = Location::where('country_id', $country->id)->get()) {
                    foreach ($locations as $location) {
                        $postCount[$country->id] += count($location->posts);
                    }
                }
            }

            return view('pages.countries', compact('countries', 'postCount'));
        } else {
            $country = Country::find($id);
            $allPosts = [];

            if ($locations = Location::where('country_id', $id)->get()) {
                foreach ($locations as $location) {
                    foreach ($location->posts as $post) {
                        array_push($allPosts, $post);
                    }
                }
            }

            return view('pages.country', compact('allPosts', 'country'));
        }
    }
}
