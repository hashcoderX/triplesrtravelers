<?php

namespace App\Http\Controllers;

use App\Models\Tripcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TripcategoryController extends Controller
{
    public function tripCategory()
    {

        $tripcategories = Tripcategory::all();

        return view('trip.tripcategory', compact('tripcategories'));
    }

    public function savetripcategory(Request $request)
    {
        $category = $request->category;
        $about_trip_category = $request->about_trip_category;

        $uploadPath = "uploads/tripcat/";

        if ($request->hasFile('backgroundimg')) {
            $file = $request->file('backgroundimg');
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();

            // Compress and store image
            $compressedImage = $this->compressImage($file->getRealPath(), public_path($imageUploadPath), 75);
            if (!$compressedImage) {
                return redirect()->back()->with('error', 'Image compression failed. Please try again.');
            }

            $tripcategory = new Tripcategory();
            $tripcategory->category = $category;
            $tripcategory->content = $about_trip_category;
            $tripcategory->cover_img = $imageUploadPath;

            $tripcategory->save();

            $tripcategories = Tripcategory::all();

            return view('trip.tripcategory', compact('tripcategories'))
                ->with('success', 'Category has been added successfully!');
        }
    }


    function convert_filesize($bytes, $decimals = 2)
    {
        $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    function compressImage($source, $destination, $quality)
    {
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];

        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source);
                break;
            default:
                return false; // Unsupported image type
        }

        if (imagejpeg($image, $destination, $quality)) {
            imagedestroy($image);
            return $destination;
        }

        imagedestroy($image);
        return false;
    }
}
