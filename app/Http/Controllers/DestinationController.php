<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Destination;
use App\Models\DestinationHasImages;
use App\Models\District;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function destnation()
    {
        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $userid = Auth::user()->id;

            $provinces = Province::all();
            $districts = District::all();
            $citys = City::all();

            $destinations = Destination::with(['province', 'district', 'city'])->get();

            return view('destination.newdestination', compact('provinces', 'districts', 'citys', 'destinations'));
        }
    }

    public function savedestination(Request $request)
    {
        $request->validate([
            'destination_name' => 'required|string|max:255',
            'googlemap_location' => 'required|string|max:100',
            'province' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'about_destination' => 'nullable|string',
        ]);

        $destination = new Destination();
        $destination->name = $request->destination_name;
        $destination->location = $request->googlemap_location;
        $destination->province = $request->province;
        $destination->distric = $request->district;
        $destination->city = $request->city;
        $destination->content = $request->about_destination;

        $destination->save();

        $destinations = Destination::all();

        $provinces = Province::all();
        $districts = District::all();
        $citys = City::all();

        return view('destination.newdestination', compact('destinations', 'provinces', 'districts', 'citys'))
            ->with('success', 'Hotel has been added successfully!');
    }

    public function viewdestination(Request $request)
    {
        $destinationid = $request->id;

        $destination = Destination::where('id', $destinationid)->first();
        $destinationimages = DestinationHasImages::where('destination_id', $destinationid)->get();

        return view('destination.destinationview', compact('destination', 'destinationimages'));
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
                $image->move(public_path('uploads/destination'), $imageName);

                // Save record in DB


                $destinationimages = new DestinationHasImages();
                $destinationimages->file_url = 'uploads/destination/' . $imageName;
                $destinationimages->destination_id = $request->destinationid;

                $destinationimages->save();
            }
        }

        // 4. Redirect back with success message
        return redirect()
            ->back()
            ->with('success', 'Images uploaded successfully!');
    }

    public function destinationlist()
    {
        $destinations = Destination::all();
        return view('destination.destinationlist', compact('destinations'));
    }
}
