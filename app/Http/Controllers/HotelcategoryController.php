<?php

namespace App\Http\Controllers;

use App\Models\Hotelcategory;
use Illuminate\Http\Request;

class HotelcategoryController extends Controller
{
    public function hotelCategory()
    {
        $hotelcategories = Hotelcategory::all();
        return view('hotel.hotelcategory', compact('hotelcategories'));
    }

    public function saveHotelcategory(Request $request)
    {
        $category = $request->category;
        $about_hotel_category = $request->about_hotel_category;

        $uploadPath = "uploads/hotelcat/";

        if ($request->hasFile('backgroundimg')) {
            $file = $request->file('backgroundimg');
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();

            // Compress and store image
            $compressedImage = $this->compressImage($file->getRealPath(), public_path($imageUploadPath), 75);
            if (!$compressedImage) {
                return redirect()->back()->with('error', 'Image compression failed. Please try again.');
            }

            $historycategory = new Hotelcategory();
            $historycategory->category = $category;
            $historycategory->content = $about_hotel_category;
            $historycategory->cover_img = $imageUploadPath;

            $historycategory->save();

            $hotelcategories = Hotelcategory::all();

            return view('hotel.hotelcategory', compact('hotelcategories'))
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
