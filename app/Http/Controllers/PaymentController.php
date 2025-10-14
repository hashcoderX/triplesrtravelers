<?php

namespace App\Http\Controllers;

use App\Models\cashDrawer;
use App\Models\Company;
use App\Models\Customer;
use App\Models\CustomerAccount;
use App\Models\Enquary;
use App\Models\Payment;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payments.paymenthsitory');
    }

    public function savePayment(Request $request)
    {

        $date = Carbon::now()->format('Y-m-d');
        $month = Carbon::now()->format('Y-m');
        $userid = Auth::user()->id;

        $data = $request->json()->all();

        $customerid = $data['customerid'];
        $paytype = $data['paytype'];
        $paidamount = $data['paidamount'];

        $customerAccount = CustomerAccount::where('customer_id', $customerid)->first();
        $customeraccountbal = $customerAccount->accountbalance;

        $newAccountbalance = $customerAccount->accountbalance + $paidamount;
        $customerAccount->accountbalance = $newAccountbalance;
        $customerAccount->save();

        // get account balance after payment 

        $customerAccountafter = CustomerAccount::where('customer_id', $customerid)->first();
        $customeraccountbalafter = $customerAccountafter->accountbalance;

        $payments = new Payment();
        $payments->company_id = '1';
        $payments->user_id = $userid;
        $payments->amount = $paidamount;
        $payments->description = 'Invoice Payment';
        $payments->date_time = $date;
        $payments->payamount = $paidamount;
        $payments->balance = $customeraccountbalafter;
        $payments->paytype = $paytype;
        $payments->payment_type = 'Credit';
        $payments->month = $month;
        $payments->invoiceid = '0';
        $payments->paystatus = 'direct pay';
        $payments->cus_id = $customerid;

        $payments->save();
        $paymentid = $payments->id;
        return response()->json(["paymentid" => $paymentid, 'message' => 'Yes']);
    }


    public function getPaymentReport(Request $request)
    {
        $paymentid = $request->payid;

        $payment = Payment::where('id', $paymentid)->first();
        $customerid = $payment->cus_id;
        $company = Company::where('id', '1')->first();
        $customer = Customer::where('id', $customerid)->first();
        // $qrData = $invoiceno;

        $htmlContent = view('partials.customerpaymentreport', compact('company', 'payment','customer'))->render();
        return response()->json(['html' => $htmlContent]);
    }


    public function saveSupPayment(Request $request)
    {

        $date = Carbon::now()->format('Y-m-d');
        $month = Carbon::now()->format('Y-m');
        $userid = Auth::user()->id;

        $data = $request->json()->all();

        $customerid = $data['customerid'];
        $paytype = $data['paytype'];
        $paidamount = $data['paidamount'];

        $customerAccount = CustomerAccount::where('customer_id', $customerid)->first();
        $customeraccountbal = $customerAccount->accountbalance;

        $newAccountbalance = $customerAccount->accountbalance + $paidamount;
        $customerAccount->accountbalance = $newAccountbalance;
        $customerAccount->save();

        // get account balance after payment 

        $customerAccountafter = CustomerAccount::where('customer_id', $customerid)->first();
        $customeraccountbalafter = $customerAccountafter->accountbalance;

        $payments = new Payment();
        $payments->company_id = '1';
        $payments->user_id = $userid;
        $payments->amount = $paidamount;
        $payments->description = 'Invoice Payment';
        $payments->date_time = $date;
        $payments->payamount = $paidamount;
        $payments->balance = $customeraccountbalafter;
        $payments->paytype = $paytype;
        $payments->payment_type = 'Credit';
        $payments->month = $month;
        $payments->invoiceid = '0';
        $payments->paystatus = 'direct pay';
        $payments->cus_id = $customerid;

        $payments->save();
        $paymentid = $payments->id;
        return response()->json(["paymentid" => $paymentid, 'message' => 'Yes']);
    }
}
