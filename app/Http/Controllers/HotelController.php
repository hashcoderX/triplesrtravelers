<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\Hotel;
use App\Models\Hotelcategory;
use App\Models\HotelHasImages;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function hotel()
    {

        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $userid = Auth::user()->id;

            $provinces = Province::all();
            $districts = District::all();
            $citys = City::all();

            $hotelcategories = Hotelcategory::all();

            $hotels = Hotel::with(['province', 'district', 'city'])->get();

            return view('hotel.hotel', compact('provinces', 'districts', 'citys', 'hotels', 'hotelcategories'));
        }
    }

    public function savehotel(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'hotelname'           => 'required|string|max:255',
            'hoteltype'           => 'required|string|max:100',
            'googlemap_location'  => 'nullable|string|max:500',
            'province'            => 'nullable|string|max:100',
            'district'            => 'nullable|string|max:100',
            'city'                => 'nullable|string|max:100',
            'abouthotel'          => 'nullable|string',
            'room_only_price'     => 'nullable|numeric|min:0',
            'bnbprice'            => 'nullable|numeric|min:0',
            'hbprice'             => 'nullable|numeric|min:0',
            'fbprice'             => 'nullable|numeric|min:0',
            'allinclusiveprice'   => 'nullable|numeric|min:0',
        ]);

        // 2. Create hotel record
        $hotel = new Hotel();
        $hotel->name              = $request->hotelname;
        $hotel->type              = $request->hoteltype;
        $hotel->location          = $request->googlemap_location;
        $hotel->province          = $request->province;
        $hotel->distric           = $request->district; // maybe rename to district in DB later
        $hotel->city              = $request->city;
        $hotel->content           = $request->abouthotel;
        $hotel->roomonlyprice     = $request->room_only_price;
        $hotel->bbprice           = $request->bnbprice;
        $hotel->hbprice           = $request->hbprice;
        $hotel->fbprice           = $request->fbprice;
        $hotel->allinclusiveprice = $request->allinclusiveprice;
        $hotel->reg_date          = Carbon::now()->format('Y-m-d');

        // 3. Save to database
        $hotel->save();

        $hotels = Hotel::with(['province', 'district', 'city'])->get();

        $hotelcategories = Hotelcategory::all();

        return view('hotel.hotel', compact('hotels', 'hotelcategories'))
            ->with('success', 'Hotel has been added successfully!');
    }

    public function hotelview(Request $request)
    {

        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $hotelid = $request->id;
            $hotel = Hotel::where('id', $hotelid)->first();
            $hotelImages = HotelHasImages::where('hotel_id', operator: $hotelid)->get();
            return view('hotel.hotelprofil', compact('hotel', 'hotelImages'));
        }
    }

    public function uploadimages(Request $request)
    {
        // 1. Validate request
        // $request->validate([
        //     'hotelid' => 'required|exists:hotels,id',
        //     'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB per image
        // ]);

        // 2. Get today's date for DB
        $date = Carbon::now()->format('Y-m-d');

        // 3. Process each uploaded image
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Create unique filename
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Move image to public/uploads/hotel
                $image->move(public_path('uploads/hotel'), $imageName);

                // Save record in DB


                $hotelimages = new HotelHasImages();
                $hotelimages->file_url = 'uploads/hotel/' . $imageName;
                $hotelimages->hotel_id = $request->hotelid;

                $hotelimages->save();
            }
        }

        // 4. Redirect back with success message
        return redirect()
            ->back()
            ->with('success', 'Images uploaded successfully!');
    }

    public function hotellist()
    {
        $hotels = Hotel::all();
        return view('hotel.hotellist', compact('hotels'));
    }

    public function exploreHotels(Request $request)
    {
        $categoriid = $request->id;
        $category = Hotelcategory::where('id', $categoriid)->first();
        $categoryName = $category->category;

        $hotels = Hotel::where('type', $categoryName)->get();

        return view('frontend.hotelviewbycategory', compact('hotels', 'category'));
    }

    public function exploreHotelall(Request $request)
    {
        $hotelid = $request->id;
        $hoteldetails = Hotel::where('id', $hotelid)->first();
        $hotelImages = HotelHasImages::where('hotel_id', $hotelid)->get();

        return view('frontend.hotelview', compact('hoteldetails', 'hotelImages'));
    }
}
