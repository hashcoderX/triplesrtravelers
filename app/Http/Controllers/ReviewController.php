<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email'    => 'required|email',
            'rating'   => 'required|integer|min:1|max:5',
        ]);

        $date = Carbon::now()->format('Y-m-d');

        $review = new Review();
        $review->note = $request->review;
        $review->author = $request->fullname;
        $review->date = $date;
        $review->rating_level = $request->rating;
        $review->status = 'active';

        $review->save();

        return response()->json(['success' => true, 'message' => 'Review saved successfully!']);
    }
}
