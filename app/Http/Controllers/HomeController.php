<?php

namespace App\Http\Controllers;

use App\Country;
use App\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('page.home');
    }

    public function showNews()
    {
        $news = News::all();
        return view('page.news', compact('news'));
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
                    $allPosts[] = $post;
                }
            }

            $posts = $this->paginate(new Collection($allPosts));
            return view('post.countryPosts', compact('posts', 'country'));
        }
    }

    public function paginate($items, $perPage = 20)
    {
        // get current page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // get items to display
        $currentItems = $items->slice(($currentPage - 1) * $perPage, $perPage);
        // create a paginator
        return new LengthAwarePaginator($currentItems, count($items), $perPage,
            $currentPage, ['path' => Paginator::resolveCurrentPath()]);
    }
}
