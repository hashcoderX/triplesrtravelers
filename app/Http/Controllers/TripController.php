<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Trip;
use App\Models\Tripcategory;
use App\Models\TripHasImages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TripController extends Controller
{

    public function trip()
    {

        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $userid = Auth::user()->id;

            $trips = Trip::all();
            $tripcategories = Tripcategory::all();

            return view('trip.newtrip', compact('trips', 'tripcategories'));
        }
    }

    public function savetrip(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'trip_title'       => 'required|string|max:355',
            'specification'    => 'required',
            'triptype'         => 'required|string',
            'trip_start'       => 'nullable|date',
            'trip_end'         => 'nullable|date|after_or_equal:trip_start',
            'about_trip'       => 'nullable|string',
            'max_passenger'    => 'nullable|integer|min:1',
            'per_adult_price'  => 'nullable|numeric|min:0',
            'per_child_price'  => 'nullable|numeric|min:0',
            'pickuplocation'   => 'nullable|string|max:255',
            'drop_location'    => 'nullable|string|max:255',
        ]);

        // 2. Create trip record
        $trip = new Trip();
        $trip->name             = $request->trip_title;
        $trip->specification    = $request->specification;
        $trip->type             = $request->triptype;
        $trip->start_date       = $request->trip_start;
        $trip->end_date         = $request->trip_end;
        $trip->content          = $request->about_trip;
        $trip->max_passenger    = $request->max_passenger ?? 0;
        $trip->per_adult_price  = $request->per_adult_price;
        $trip->per_child_price  = $request->per_child_price;
        $trip->pickup           = $request->pickuplocation;
        $trip->drop_up          = $request->drop_location;
        $trip->reg_date         = Carbon::now()->format('Y-m-d');
        $trip->status          = 'running';

        // 3. Save to database
        $trip->save();

        // 4. Redirect with success message
        $trips = Trip::all();
        $tripcategories = Tripcategory::all();

        return view('trip.newtrip', compact('trips', 'tripcategories'))
            ->with('success', 'Hotel has been added successfully!');
    }

    public function viewtrip(Request $request)
    {

        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $tripid = $request->id;
            $trip = Trip::where('id', $tripid)->first();
            $tripImages = TripHasImages::where('trip_id', operator: $tripid)->get();
            return view('trip.tripview', compact('trip', 'tripImages'));
        }
    }

    public function uploadimages(Request $request)
    {
        $date = Carbon::now()->format('Y-m-d');

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Create unique filename
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Move image to public/uploads/hotel
                $image->move(public_path('uploads/trip'), $imageName);

                // Save record in DB


                $tripimages = new TripHasImages();
                $tripimages->file_url = 'uploads/trip/' . $imageName;
                $tripimages->trip_id = $request->tripid;

                $tripimages->save();
            }
        }

        // 4. Redirect back with success message
        return redirect()
            ->back()
            ->with('success', 'Images uploaded successfully!');
    }

    public function triplist()
    {
        $trips = Trip::where('status', 'running')->get();
        return view('trip.triplist', compact('trips'));
    }

    public function endtrip(Request $request)
    {

        $tripid = $request->tripid;

        $trip = Trip::where('id', $tripid)->first();
        $trip->status = "end";
        $trip->save();
    }

    public function exploreTrip(Request $request)
    {
        $tripid = $request->id;
        $trip = Trip::where('id', $tripid)->first();
        $tripImages = TripHasImages::where('trip_id', operator: $tripid)->get();
        $destinations = Destination::with('firstImage')->get();
        return view('frontend.tripdetails', compact('trip', 'tripImages', 'destinations'));
    }

    public function viewbycategory($category, $id)
    {
        // Fetch trips with first image
        $trips = Trip::where('type', $category)
            ->with('firstImage')
            ->get();

        $category = Tripcategory::find($id);
        $destinations = Destination::with('firstImage')->get();

        return view('frontend.tripviewbycategory', compact('category', 'id', 'trips', 'destinations'));
    }
}
