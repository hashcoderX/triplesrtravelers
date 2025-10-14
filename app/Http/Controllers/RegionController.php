<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\RegionHasImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{
    public function region()
    {
        $regions = Region::all();
        return view('regions.addregions', compact('regions'));
    }

    public function saveregion(Request $request)
    {

        $request->validate([
            'topic'       => 'required|string',
            'about_region'    => 'string',
        ]);

        $region = new Region();
        $region->topic = $request->topic;
        $region->content = $request->about_region;

        $region->save();

        $regions = Region::all();

        return view('regions.addregions', compact('regions'))
            ->with('success', 'Hotel has been added successfully!');
    }

    public function viewregion(Request $request)
    {
        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $regionid = $request->id;
            $region = Region::where('id', $regionid)->first();
            $regionImages = RegionHasImages::where('region_id', operator: $regionid)->get();
            return view('regions.viewregions', compact('region', 'regionImages'));
        }
    }
}
