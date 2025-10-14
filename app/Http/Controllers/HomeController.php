<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Destination;
use App\Models\Employee;
use App\Models\Hotel;
use App\Models\Hotelcategory;
use App\Models\Invoice;
use App\Models\Level;
use App\Models\Review;
use App\Models\Trip;
use App\Models\Tripcategory;
use App\Models\User;
use App\Models\Vehical;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{


    public function trips()
    {
        $trips = Trip::where('status', 'running')->get();
        $tripcategorys = Tripcategory::all();
        $destinations = Destination::all();
        return view('frontend.trips', compact('trips', 'tripcategorys', 'destinations'));
    }

    public function review()
    {
        $reviews = Review::where('status', 'active')->get();
        return view('frontend.review', compact('reviews'));
    }

    public function hotels()
    {
        $destinations = Destination::all();
        $hotelcategories = Hotelcategory::all();
        $hotels = Hotel::all();
        return view('frontend.hotels', compact('destinations', 'hotels', 'hotelcategories'));
    }

    public function thingstodo()
    {
        $destinations = Destination::with('firstImage')->get();
        return view('frontend.thingstodo', compact('destinations'));
    }

    public function resturent()
    {
        $resturents = Hotel::where('type', 'Restaurants')->get();
        return view('frontend.restaurants', compact('resturents'));
    }

    public function cruises()
    {
        return view('frontend.cruises');
    }

    public function blog()
    {
        return view('frontend.blog');
    }



    public function setting()
    {
        if (Auth::user()->usertype == 'superAdmin') {
            $companys = Company::all();
            $users = [];
        }
        if (Auth::user()->usertype == 'Admin') {
            $companyId = Auth::user()->company_id;
            $companys = Company::where('id', $companyId)->get();
            $users = User::where('company_id', $companyId)->get();
        }
        if (Auth::user()->usertype == 'User') {
            $companyId = Auth::user()->company_id;
            $userId = Auth::user()->id;
            $companys = Company::where('id', $companyId)->get();
            $users = User::where('id', $userId)->get();
        }


        return view('setting.index', compact('companys', 'users'));
    }

    public function frontendindex()
    {

        $destinations = Destination::with('firstImage')->get();
        return view('frontend.index', compact('destinations'));
    }

    public function frabout()
    {
        return view('frontend.about');
    }

    public function frservices()
    {
        return view('frontend.services');
    }

    public function frcontactus()
    {
        return view('frontend.contactus');
    }

    public function portal()
    {
        return view('frontend.login');
    }

    public function aboutus()
    {
        return view('frontend.aboutus');
    }

    public function contactUs()
    {
        return view('frontend.contactus');
    }

    public function exploreThingsToDo($id)
    {
        
    }
}
