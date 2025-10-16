<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BacklisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CashDrawerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeHasLeaveController;
use App\Http\Controllers\EnquaryController;
use App\Http\Controllers\EstimationController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\GrnController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelcategoryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NewcontactController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PnlController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TripcategoryController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\VehicalController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WorkerController;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/backend', function () {
    return view('index');
});

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Done';
});

Route::get('/dashboard', function () {
    if (!Auth::check() || Auth::user()->id == '') {
        return view('index');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('guest')->group(function () {
    Route::get('/customerlogin', function () {
        return view('frontend.customerlogin');
    })->name('customerlogin');

    Route::post('/customerlogin', [AuthController::class, 'customerLogin'])->name('customerLogin');
});


// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robotsTxt'])->name('robots');


// front end 

Route::get('/', [HomeController::class, 'frontendindex'])->name('frontendindex');
Route::get('fr/trips', [HomeController::class, 'trips'])->name('trips');
Route::get('fr/review', [HomeController::class, 'review'])->name('review');
Route::get('fr/blog', [HomeController::class, 'blog'])->name('blog');

Route::get('fr/hotels', [HomeController::class, 'hotels'])->name('hotels');
Route::get('fr/thingstodo', [HomeController::class, 'thingstodo'])->name('thingstodo');
Route::get('fr/resturent', [HomeController::class, 'resturent'])->name('resturent');
Route::get('fr/cruises', [HomeController::class, 'cruises'])->name('cruises');

Route::get('fr/thingstodo/{id}', [HomeController::class, 'exploreThingsToDo'])->name('exploreThingsToDo');

// trip 
Route::get('fr/exploretrip/{id}', [TripController::class, 'exploreTrip'])->name('exploreTrip');  
Route::get('fr/viewhotelbycategory/{id}', [HotelController::class, 'exploreHotels'])->name('exploreHotels');
Route::post('/addnewleads', [NewcontactController::class, 'savelead'])->name('savelead');

// aboutus 

Route::get('fr/about', [HomeController::class, 'aboutus'])->name('aboutus');  
Route::get('fr/contactus', [HomeController::class, 'contactUs'])->name('contactUs');

// end 
Route::post('/savereview', [ReviewController::class, 'store'])->name('reviews.store');
// review 

// front end hotel 
Route::get('fr/explorehotel/{id}', [HotelController::class, 'exploreHotelall'])->name('exploreHotelall');  
// End 

// End 

// Customer Authentication 
Route::post('/registerwebcustomer', [CustomerController::class, 'registerWebsiteCustomers'])->name('registerWebsiteCustomers');

// Backend Routes 

// hotel 
Route::get('/addnewhotel', [HotelController::class, 'hotel'])->name('hotel');
Route::post('/savehotel', [HotelController::class, 'savehotel'])->name('savehotel');
Route::get('/hoteldetails/{id}', [HotelController::class, 'hotelview'])->name('hotelview');
Route::post('/uploadhotelimages', [HotelController::class, 'uploadimages'])->name('uploadimages');
Route::get('/hotellist', [HotelController::class, 'hotellist'])->name('hotellist');
// End 

// hotel category 

Route::get('/hotelcategory', [HotelcategoryController::class, 'hotelCategory'])->name('hotelCategory');
Route::post('/savehotelcategory', [HotelcategoryController::class, 'saveHotelcategory'])->name('saveHotelcategory');

// Trip 
Route::get('/addnewtrip', [TripController::class, 'trip'])->name('trip');
Route::post('/savetrip', [TripController::class, 'savetrip'])->name('savetrip');
Route::get('/trip/{id}', [TripController::class, 'viewtrip'])->name('viewtrip');
Route::post('/uploadtripimages', [TripController::class, 'uploadimages'])->name('uploadimages');
Route::get('/triplist', [TripController::class, 'triplist'])->name('triplist');
Route::get('/endtrip', [TripController::class, 'endtrip'])->name('endtrip');
Route::get('/exploretrip/{category}/{id}', [TripController::class, 'viewbycategory'])->name('viewbycategory');


// trip category 
Route::get('/tripcategory', [TripcategoryController::class, 'tripCategory'])->name('tripCategory');
Route::post('/addtripcategory', [TripcategoryController::class, 'savetripcategory'])->name('savetripcategory');

// End  


// Destination 
Route::get('/addestination', [DestinationController::class, 'destnation'])->name('destnation');
Route::post('/savedestinationation', [DestinationController::class, 'savedestination'])->name('savedestination');
Route::get('/destinationdetails/{id}', [DestinationController::class, 'viewdestination'])->name('viewdestination');
Route::post('/uploaddestinationimages', [DestinationController::class, 'uploadimages'])->name('uploadimages');
Route::get('/destinationlist', [DestinationController::class, 'destinationlist'])->name('destinationlist');
// End 

// Sub Destination
Route::get('/addsubdestination', [DestinationController::class, 'subdestnation'])->name('subdestnation');
Route::post('/savesubdestinationation', [DestinationController::class, 'savesubdestination'])->name('savesubdestination');
Route::get('/subdestinationlist', [DestinationController::class, 'subdestinationlist'])->name('subdestinationlist');

// region  
Route::get('/adregions', [RegionController::class, 'region'])->name('region');
Route::post('/saveregion', [RegionController::class, 'saveregion'])->name('saveregion');
Route::get('/regions/{id}', [RegionController::class, 'viewregion'])->name('viewregion');
// End 


// Review 
Route::get('/reviewlist', [ReviewController::class, 'reviewlist'])->name('reviewlist');


// End 
Route::get('/get-districts/{province_id}', [LocationController::class, 'getDistricts']);
Route::get('/get-cities/{district_id}', [LocationController::class, 'getCities']);


Route::get('/candidates', [App\Http\Controllers\HomeController::class, 'regInterviewer'])->name('regInterviewer');
Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('setting');


// user privilages 
Route::get('/createUserRoll', [App\Http\Controllers\PermitionController::class, 'createUserRoll']);


// create company 
Route::get('/registercompany', [CompanyController::class, 'index'])->name('register.index');
Route::post('/registercompany', [CompanyController::class, 'register'])->name('register.company');
Route::post('/registeruser', [CompanyController::class, 'useradd'])->name('useradd.company');

// End newarticle
Route::get('/reviewlist', [ReviewController::class, 'reviewlist'])->name('reviewlist');
// Vehicle 


// Booking 
Route::get('/bookvehicle', [BookingController::class, 'bookvehicle'])->name('bookvehicle');
Route::post('/addbooking', [BookingController::class, 'addregister'])->name('addregister');
Route::get('/booking/{id}', [BookingController::class, 'viewbooking'])->name('viewbooking');
Route::get('/viewbooking', [BookingController::class, 'viewbookingdetails'])->name('viewbookingdetails');
Route::get('/getbookingbydate', [BookingController::class, 'bookingBydate'])->name('bookingBydate');
Route::get('/getbookingdetails', [BookingController::class, 'bookingDetails'])->name('bookingDetails');
Route::get('/cancelbooking', [BookingController::class, 'cancelbooking'])->name('cancelbooking');
Route::get('/ischeckcompletevehicle', [BookingController::class, 'ischeckvehicle'])->name('ischeckvehicle');

Route::get('/getdetailsbooking', [BookingController::class, 'getbookingdetails'])->name('getbookingdetails');
// End 




// POS 

// payments 
Route::POST('/completepayment', [PaymentController::class, 'addPayment'])->name('addPayment');
// End 
// Get My client Details 
Route::get('/clientlists', [CustomerController::class, 'myclientlist'])->name('myclientlist');
Route::get('/getcustomerdetails', [CustomerController::class, 'customerDetails'])->name('customerDetails');
Route::get('/customer', [CustomerController::class, 'index'])->name('index');
Route::post('/savecustomer', [CustomerController::class, 'register'])->name('register');
Route::get('/customer/{id}', [CustomerController::class, 'profile'])->name('profile');
Route::post('/updatecustomer', [CustomerController::class, 'update'])->name('update');
Route::get('/viewaccount/{id}', [CustomerController::class, 'viewaccount'])->name('viewaccount');
Route::post('/updatecustomeraccount', [CustomerController::class, 'updateaccount'])->name('updateaccount');
// End 

// Payments   
Route::get('/historypayment', [PaymentController::class, 'index'])->name('index');
Route::get('/getpaymenthistory', [PaymentController::class, 'getHistory'])->name('getHistory');
Route::get('/viewenquarybypayhistory', [PaymentController::class, 'viewpayHistory'])->name('viewpayHistory');

// End 

// Notification  
Route::get('/removenotification', [NotificationController::class, 'removeNotification'])->name('removeNotification');
Route::get('/notifications', [NotificationController::class, 'index'])->name('index');
Route::get('/getnotificationdetails', [NotificationController::class, 'getnotificationdetails'])->name('getnotificationdetails');

// End 





Route::get('/portal', [HomeController::class, 'portal'])->name('portal');


// Payments 
Route::POST('/savepayment', [PaymentController::class, 'savePayment'])->name('savePayment');
Route::get('/getpaymentreport', [PaymentController::class, 'getPaymentReport'])->name('getPaymentReport');
Route::POST('/savesupplierpayment', [PaymentController::class, 'saveSupPayment'])->name('saveSupPayment');


Route::post('/customerlogin', [AuthController::class, 'customerLogin']);



Route::get('/dashboardfr', [AuthController::class, 'rederectDashbord'])
    ->middleware('auth')
    ->name('rederectDashbord');


Route::get('/getservicerecord/{cusid}/{vehicleid}', [HomeController::class, 'getServiceRecord'])->name('getServiceRecord');




// email 

Route::post('/send-email', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'service' => 'required|string',
        'message' => 'nullable|string',
    ]);

    Mail::to('your-email@example.com')->send(new AppointmentMail($data));

    return response()->json(['message' => 'Email sent successfully!']);
})->name('send.email');

require __DIR__ . '/auth.php';
