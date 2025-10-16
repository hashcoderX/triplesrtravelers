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
use App\Services\SeoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{


    public function trips()
    {
        $seo = new SeoService();
        $seo->setTitle('Our Trips - Explore Sri Lanka Adventures')
            ->setDescription('Discover amazing Sri Lankan adventures with Triple SR Travelers. Browse our curated selection of trips, from cultural tours to beach getaways and mountain expeditions.')
            ->setKeywords(['Sri Lanka trips', 'adventure tours', 'cultural tours', 'travel packages'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Our Trips');

        $trips = Trip::where('status', 'running')->get();
        $tripcategorys = Tripcategory::all();
        $destinations = Destination::all();
        
        return view('frontend.trips', compact('trips', 'tripcategorys', 'destinations', 'seo'));
    }

    public function review()
    {
        $seo = new SeoService();
        $seo->setTitle('Customer Reviews - Triple SR Travelers')
            ->setDescription('Read authentic reviews from our satisfied customers. Discover what travelers say about their Sri Lankan adventures with Triple SR Travelers.')
            ->setKeywords(['customer reviews', 'travel testimonials', 'Sri Lanka travel reviews'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Reviews');

        $reviews = Review::where('status', 'active')->get();
        return view('frontend.review', compact('reviews', 'seo'));
    }

    public function hotels()
    {
        $seo = new SeoService();
        $seo->setTitle('Hotels & Accommodation - Sri Lanka')
            ->setDescription('Find the perfect accommodation for your Sri Lankan getaway. Browse luxury hotels, boutique resorts, and budget-friendly options with Triple SR Travelers.')
            ->setKeywords(['Sri Lanka hotels', 'accommodation', 'luxury resorts', 'boutique hotels'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Hotels');

        $destinations = Destination::all();
        $hotelcategories = Hotelcategory::all();
        $hotels = Hotel::all();
        return view('frontend.hotels', compact('destinations', 'hotels', 'hotelcategories', 'seo'));
    }

    public function thingstodo()
    {
        $seo = new SeoService();
        $seo->setTitle('Things to Do in Sri Lanka - Activities & Attractions')
            ->setDescription('Discover the best activities and attractions in Sri Lanka. From ancient temples to wildlife safaris, find unforgettable experiences with Triple SR Travelers.')
            ->setKeywords(['Sri Lanka activities', 'tourist attractions', 'things to do', 'experiences'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Things to Do');

        $destinations = Destination::with('firstImage')->get();
        return view('frontend.thingstodo', compact('destinations', 'seo'));
    }

    public function resturent()
    {
        $seo = new SeoService();
        $seo->setTitle('Restaurants & Dining - Sri Lankan Cuisine')
            ->setDescription('Savor the flavors of Sri Lanka. Discover the best restaurants and local dining experiences recommended by Triple SR Travelers.')
            ->setKeywords(['Sri Lankan cuisine', 'restaurants', 'local food', 'dining experiences'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Restaurants');

        $resturents = Hotel::where('type', 'Restaurants')->get();
        return view('frontend.restaurants', compact('resturents', 'seo'));
    }

    public function cruises()
    {
        $seo = new SeoService();
        $seo->setTitle('Cruises & Boat Tours - Sri Lanka Waters')
            ->setDescription('Explore Sri Lankan waters with our cruise and boat tour options. Enjoy whale watching, fishing trips, and scenic coastal journeys.')
            ->setKeywords(['Sri Lanka cruises', 'boat tours', 'whale watching', 'coastal tours'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Cruises');

        return view('frontend.cruises', compact('seo'));
    }

    public function blog()
    {
        $seo = new SeoService();
        $seo->setTitle('Travel Blog - Sri Lanka Travel Tips & Guides')
            ->setDescription('Get inspired with our travel blog featuring Sri Lankan travel tips, destination guides, and insider stories from Triple SR Travelers.')
            ->setKeywords(['Sri Lanka travel blog', 'travel tips', 'destination guides', 'travel stories'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Blog');

        return view('frontend.blog', compact('seo'));
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
        $seo = new SeoService();
        $seo->setupHomepage();

        $destinations = Destination::with('firstImage')->get();
        return view('frontend.index', compact('destinations', 'seo'));
    }

    public function frabout()
    {
        $seo = new SeoService();
        $seo->setTitle('About Us - Triple SR Travelers')
            ->setDescription('Learn about Triple SR Travelers, your trusted partner for Sri Lankan adventures. Discover our story, mission, and commitment to creating unforgettable travel experiences.')
            ->setKeywords(['about us', 'travel agency', 'Sri Lanka specialists', 'company story'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('About Us');

        return view('frontend.about', compact('seo'));
    }

    public function frservices()
    {
        $seo = new SeoService();
        $seo->setTitle('Our Services - Travel Planning & Tours')
            ->setDescription('Explore our comprehensive travel services including custom tour planning, hotel bookings, transportation, and guided experiences throughout Sri Lanka.')
            ->setKeywords(['travel services', 'tour planning', 'custom tours', 'travel assistance'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Services');

        return view('frontend.services', compact('seo'));
    }

    public function frcontactus()
    {
        $seo = new SeoService();
        $seo->setTitle('Contact Us - Triple SR Travelers')
            ->setDescription('Get in touch with Triple SR Travelers for your Sri Lankan adventure. Contact our travel experts for personalized trip planning and inquiries.')
            ->setKeywords(['contact us', 'travel inquiries', 'trip planning', 'customer support'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Contact Us');

        return view('frontend.contactus', compact('seo'));
    }

    public function portal()
    {
        return view('frontend.login');
    }

    public function aboutus()
    {
        $seo = new SeoService();
        $seo->setTitle('About Triple SR Travelers - Sri Lanka Travel Experts')
            ->setDescription('Triple SR Travelers is your trusted partner for exploring Sri Lanka. With years of experience, we create personalized travel experiences that showcase the best of our beautiful island.')
            ->setKeywords(['about Triple SR Travelers', 'Sri Lanka travel experts', 'local travel agency', 'experienced guides'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('About Us');

        return view('frontend.aboutus', compact('seo'));
    }

    public function contactUs()
    {
        $seo = new SeoService();
        $seo->setTitle('Contact Triple SR Travelers - Plan Your Sri Lankan Adventure')
            ->setDescription('Ready to explore Sri Lanka? Contact Triple SR Travelers today to start planning your perfect adventure. Our travel experts are here to help you create unforgettable memories.')
            ->setKeywords(['contact Triple SR Travelers', 'plan Sri Lanka trip', 'travel consultation', 'trip inquiry'])
            ->addBreadcrumb('Home', url('/'))
            ->addBreadcrumb('Contact Us');

        return view('frontend.contactus', compact('seo'));
    }

    public function exploreThingsToDo($id)
    {
        
    }
}
