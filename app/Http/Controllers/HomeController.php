<?php

namespace App\Http\Controllers;

use App\Country;
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
            return view('pages.countries', compact('countries'));
        } else {
            return view('pages.country', compact('id'));
        }
    }
}
