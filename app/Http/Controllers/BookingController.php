<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\CustomerAccount;
use App\Models\Notification;
use App\Models\Vehical;
use App\Models\Vehicle_has_booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
     public function bookvehicle()
     {

          if (!Auth::check() || Auth::user()->id == '') {
               return view('index');
          } else {
               $userid = Auth::user()->id;
               $companyid = Auth::user()->company_id;

               $vehicleLists = Vehical::where('company_id', $companyid)
                    ->get();

               $date = Carbon::now()->format('Y-m-d');

               $bookings = Vehicle_has_booking::join('customers', 'vehicle_has_bookings.customer_id', '=', 'customers.id')
                    ->where('vehicle_has_bookings.company_id', $companyid)
                    ->where('status', 'pending')
                    ->select('vehicle_has_bookings.*', 'customers.full_name', 'customers.telephone_no')->get();

               return view('booking.index', compact('bookings', 'vehicleLists'));
          }
     }

     public function addregister(Request $request)
     {
          // Validate the request data
          $date = Carbon::now()->format('Y-m-d');
          $userid = Auth::user()->id;
          $companyid = Auth::user()->company_id;

          $bookstart = $request->booking_start_date;
          $returnDate = $request->booking_return_date;
          $vehicleno = $request->vehicleno;

          //     set available 
          if ($bookstart == $date) {
               $available = "no";
          } else {
               $available = "yes";
          }
          // End 

          $checkbookings = Vehicle_has_booking::where('vehicle_no', $vehicleno)
               ->where(function ($query) use ($bookstart, $returnDate) {
                    $query->whereDate('book_start_date', '<=', $returnDate)
                         ->whereDate('return_date', '>=', $bookstart)->where('status', '!=', 'canceled');
               })
               ->count();

          if ($checkbookings > 0) {
               return response()->json(['message' => 'This vehicle is already booked for the selected dates.', 'code' => '203']);
          } else {
               $customerNic = $request->nic;
               $checkcustomer = Customer::where('nic', $customerNic)->where('company_id', $companyid)->first();
               if ($checkcustomer) {
                    $customer_id = $checkcustomer->id;
               } else {
                    $customer = new Customer();
                    $customer->user_id = $userid;
                    $customer->company_id = $companyid;
                    $customer->full_name = $request->customername;
                    $customer->reg_date = $date;
                    $customer->nic = $request->nic;
                    $customer->telephone_no = $request->contactno;
                    $customer->save();
                    $customer_id = $customer->id;

                    $customeraccount = new CustomerAccount();
                    $customeraccount->company_id = $companyid;
                    $customeraccount->user_id = $userid;
                    $customeraccount->customer_id = $customer_id;
                    $customeraccount->accountbalance = 0;

                    $customeraccount->save();
               }

               $booking = new Booking();
               $booking->user_id = $userid;
               $booking->company_id = $companyid;
               $booking->vehicle_no = $vehicleno;
               $booking->book_date = $bookstart;
               $booking->pick_time = $request->picktime;
               $booking->booked_date = $date;
               $booking->booked_time = $date;
               $booking->customer_name = $request->customername;
               $booking->customer_id = $customer_id;
               $booking->save();

               $vehiclehasBooking = new Vehicle_has_booking();
               $vehiclehasBooking->user_id = $userid;
               $vehiclehasBooking->company_id = $companyid;
               $vehiclehasBooking->vehicle_no = $vehicleno;
               $vehiclehasBooking->book_start_date = $bookstart;
               $vehiclehasBooking->pick_time = $request->picktime;
               $vehiclehasBooking->pick_location = $request->picklocation;
               $vehiclehasBooking->wheretogo = $request->wheretogo;
               $vehiclehasBooking->return_date = $returnDate;
               $vehiclehasBooking->return_time = $request->booking_return_time;
               $vehiclehasBooking->return_location = $request->booking_return_location;
               $vehiclehasBooking->book_time = $date;
               $vehiclehasBooking->isdriver = $request->hiretypr;
               $vehiclehasBooking->hire_location = $request->wheretogo;
               $vehiclehasBooking->status = 'pending';
               $vehiclehasBooking->note = $request->note;
               $vehiclehasBooking->customer_id = $customer_id;
               $vehiclehasBooking->save();

               $vehicle = Vehical::where('vehical_no', $vehicleno)->first();
               $vehicle->avalibility = $available;
               $vehicle->save();

               // Prepare and save the notification
               $notification = new Notification();
               $notificationStartDay = Carbon::parse($bookstart)->subDays(2)->format('Y-m-d');
               $notificationEndDay = Carbon::parse($returnDate)->format('Y-m-d');
               $descriptionnotification = "{$request->customername} successfully booked the vehicle with license plate {$vehicleno}.";

               $notification->type = 'Booking Notification';
               $notification->notification_level = 'All';
               $notification->read_state = 'None';
               $notification->topic = 'Booking Notification';
               $notification->notifiaction_date_start = $notificationStartDay;
               $notification->notification_date_end = $notificationEndDay;
               $notification->time = '';
               $notification->description = $descriptionnotification;
               $notification->state = 'pending';
               $notification->company_id = $companyid;
               $notification->save();

               // Return a success response
               return response()->json(['message' => 'Booking saved successfully!', 'booking' => $vehiclehasBooking], 201);
          }
     }

     public function viewbookingdetails()
     {

          if (!Auth::check() || Auth::user()->id == '') {
               return view('index');
          } else {
               $userid = Auth::user()->id;
               $companyid = Auth::user()->company_id;

               $vehicleLists = Vehical::where('company_id', $companyid)->get();

               $bookings = Vehicle_has_booking::join('customers', 'vehicle_has_bookings.customer_id', '=', 'customers.id')
                    ->where('vehicle_has_bookings.company_id', $companyid)
                    ->where('vehicle_has_bookings.status', 'pending')

                    ->select('vehicle_has_bookings.*', 'customers.full_name', 'customers.telephone_no')->get();

               return view('booking.viewbookinglist', compact('bookings', 'vehicleLists'));
          }
     }

     public function bookingBydate(Request $request)
     {

          if (!Auth::check() || Auth::user()->id == '') {
               return view('index');
          } else {
               $userid = Auth::user()->id;
               $companyid = Auth::user()->company_id;

               // Retrieve the list of vehicles for the company
               $vehicleLists = Vehical::where('company_id', $companyid)->get();

               // Get the current date or the date from the request
               $date = $request->input('bookingdate', Carbon::now()->format('Y-m-d'));

               // Join bookings with customers to get the necessary details, and add a where condition for the date
               $bookings = Vehicle_has_booking::join('customers', 'vehicle_has_bookings.customer_id', '=', 'customers.id')
                    ->where('vehicle_has_bookings.book_start_date', $date) // Adjust column name as per your table schema
                    ->select('vehicle_has_bookings.*', 'customers.full_name', 'customers.telephone_no')
                    ->get();

               // Render the view and return the HTML content as JSON
               $htmlContent = view('partials.booking_date', compact('vehicleLists', 'bookings'))->render();
               return response()->json(['html' => $htmlContent]);
          }
     }

     public function bookingDetails(Request $request)
     {
          if (!Auth::check() || Auth::user()->id == '') {
               return view('index');
          } else {
               $userid = Auth::user()->id;
               $companyid = Auth::user()->company_id;
               $bookingid = $request->bookingid;
               $startDate = '';
               $returnDate = '';
               // Retrieve the list of vehicles for the company
               $vehicleLists = Vehical::where('company_id', $companyid)->get();

               // Get the current date or the date from the request
               $date = $request->input('bookingdate', Carbon::now()->format('Y-m-d'));

               // Join bookings with customers to get the necessary details, and add a where condition for the date
               $bookings = Vehicle_has_booking::join('customers', 'vehicle_has_bookings.customer_id', '=', 'customers.id')
                    ->where('vehicle_has_bookings.id', $bookingid) // Adjust column name as per your table schema
                    ->select('vehicle_has_bookings.*', 'customers.full_name', 'customers.telephone_no', 'customers.nic')
                    ->get();

               foreach ($bookings as $booking) {
                    $startDate = $booking->book_start_date;
                    $returnDate = $booking->return_date;
               }
               // Render the view and return the HTML content as JSON
               $htmlContent = view('partials.bookingview', compact('bookings', 'startDate', 'returnDate'))->render();
               return response()->json(['html' => $htmlContent]);
          }
     }

     public function cancelbooking(Request $request)
     {
          $userid = Auth::user()->id;
          $companyid = Auth::user()->company_id;
          $id = $request->bookingid;
          $date = Carbon::now()->format('Y-m-d');

          $booking = Vehicle_has_booking::find($id);
          $vehicleNo = $booking->vehicle_no;

          if ($booking) {
               $booking->status = 'canceled';
               $booking->save();

               // check is avalible booking today 
               $isbookingToday = Vehicle_has_booking::where('vehicle_no', $vehicleNo)->where('book_start_date', $date)->first();
               if ($isbookingToday) {
                    $vehicle = Vehical::where('vehical_no', $vehicleNo)->first();
                    $vehicle->avalibility = 'yes';
                    $vehicle->save();
               }
          }
     }

     public function getbookingdetails(Request $request)
     {
          $bookingid = $request->bookingid;

          $bookings = Vehicle_has_booking::join('customers', 'vehicle_has_bookings.customer_id', '=', 'customers.id')
               ->where('vehicle_has_bookings.id', $bookingid) // Adjust column name as per your table schema
               ->select('vehicle_has_bookings.*', 'customers.full_name', 'customers.telephone_no', 'customers.nic', 'customers.driving_licen_photo', 'customers.livingvarification', 'customers.customer_photo', 'customers.street', 'customers.address_line_one', 'customers.city')
               ->first();

          if ($bookings) {
               return response()->json(['data' => $bookings], 200);
          } else {
               return response()->json(['message' => 'Booking not found'], 404);
          }
     }

     public function ischeckvehicle(Request $request)
     {
          $vehicalNo = $request->vehicalno;
          $per_day_rental = '';
          $per_week_rental = '';
          $per_month_rental = '';

          $vehical = Vehical::where('vehical_no', $vehicalNo)->get();
          foreach ($vehical as $vehicleDetails) {
               $per_day_rental = $vehicleDetails->per_day_rental;
               $per_week_rental = $vehicleDetails->per_week_rental;
               $per_month_rental = $vehicleDetails->per_month_rental;
          }

          if ($per_day_rental == '' || $per_week_rental == '' || $per_month_rental == '') {
               return response()->json(['message' => 'Incomplete vehicle.update rental detail and durations.then try again.'], 201);
          } else {
               return response()->json(['message' => 'verified'], 200);
          }
     }
}
