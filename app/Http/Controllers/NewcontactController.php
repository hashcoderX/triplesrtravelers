<?php

namespace App\Http\Controllers;

use App\Models\Newcontact;
use Illuminate\Http\Request;

class NewcontactController extends Controller
{
    public function savelead(Request $request)
    {
        $fullname = $request->fullname;
        $contactno = $request->contactno;
        $email = $request->email;
        $country = $request->country;

        $lead = new Newcontact();
        $lead->fullname = $fullname;
        $lead->contactno = $contactno;
        $lead->email = $email;
        $lead->country = $country;

        $lead->save();

        return response()->json([
            'message' => '',
            'lead' => $lead
        ]);
    }
}
