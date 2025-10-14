<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    //
    public function index()
    {
        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            return view('company.addcomany');
        }
    }

    public function register(Request $request)
    {
        $now = Carbon::now();
        $today = $now->toDateString();

        $company = new Company();
        $user = new User();

        $uploadPath = "companylogo/";

        $companylogofilepath = '';
        $footerfilepath = '';
        $companyheaderfilepath = '';


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $companylogofilepath = '';
            

            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $companylogofilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $customercompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($customercompressedImage) {
                        $companylogofilepath = $customercompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        if ($request->hasFile('letterhead')) {
            $file = $request->file('letterhead');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $companyheaderfilepath = '';

            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $companyheaderfilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $letterheadcompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($letterheadcompressedImage) {
                        $companyheaderfilepath = $letterheadcompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        if ($request->hasFile('footer')) {
            $file = $request->file('footer');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $footerfilepath = '';

            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $footerfilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $footercompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($footercompressedImage) {
                        $footerfilepath = $footercompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        $company->name    = $request->companyname;
        $company->company_code    = $request->company_code;
        $company->reg_no = $request->regno;
        $company->address = $request->address;
        $company->owner_name = $request->ownername;
        $company->contact_no = $request->phone_number;
        $company->mobile_number = $request->mobile_number;
        $company->website = $request->website;;
        $company->logo = $companylogofilepath;
        $company->description = '';
        $company->register_date = $today;
        $company->email = $request->email;
        $company->password = Hash::make($request->password);
        $company->payby = $request->payby;
        $company->header = $companyheaderfilepath;
        $company->footer = $footerfilepath;

        $success = $company->save();

        if ($success) {
            $companyid = $company->id;
            $user->name = $request->companyname;
            $user->email  = $request->email;
            $user->usertype = 'Admin';
            $user->password = Hash::make($request->password);
            $user->company_id = $companyid;

            $user->save();
        }

        return response()->json([
            "status" => 200,
            "message" => 'Registration Compleated'
        ]);
    }

    function convert_filesize($bytes, $decimals = 2)
    {
        $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    function compressImage($source, $destination, $quality)
    {
        // Get image info
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];

        // Create a new image from file
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

        // Save image
        imagejpeg($image, $destination, $quality);

        // Free up memory
        imagedestroy($image);

        // Return compressed image
        return $destination;
    }

    public function useradd(Request $request)
    {
        $name = $request->name;
        $email = $request->email_user;
        $password = $request->userpassword;
        $userType = 'User';
        $companyid = Auth::user()->company_id;

        $user = new User();

        $user->name = $name;
        $user->email  = $email;
        $user->usertype = $userType;
        $user->password = Hash::make($password);
        $user->company_id = $companyid;

        $user->save();

        return response()->json([
            "status" => 200,
            "message" => 'Registration Compleated'
        ]);
    }
}
