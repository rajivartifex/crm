<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class BusinessIdentityController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:business-identity-list', ['only' => ['view_business_identity']]);
         $this->middleware('permission:business-identity-edit', ['only' => ['business_identity_store']]);
    }

    public function view_business_identity(Request $request)
    {
        return view('pages.customers.profile_section.bus_identity');
    }

    public function business_identity_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['cust_id'])){
                $customer = new Customer();
                $customer->cust_business_name = $request['ff']['cust_business_name'];
                $customer->cust_business_country = $request['ff']['cust_business_country'];
                $customer->cust_business_telephone = $request['ff']['cust_business_telephone'];
                $customer->cust_business_website = $request['ff']['cust_business_website'];
                $customer->save();

                session()->flash('success', 'Business identity created successfully!');
                session()->flash('title', 'Business Identity');

                return response()->json([
                    'data' => $customer
                ]);
            }else{
                $customer = Customer::find($request['ff']['cust_id']);
                $customer->cust_business_name = $request['ff']['cust_business_name'];
                $customer->cust_business_country = $request['ff']['cust_business_country'];
                $customer->cust_business_telephone = $request['ff']['cust_business_telephone'];
                $customer->cust_business_website = $request['ff']['cust_business_website'];
                $customer->save();

                session()->flash('success', 'Business identity updated successfully!');
                session()->flash('title', 'Business Identity');

                return response()->json([
                    'data' => $customer
                ]);
            }
        }
    }
}
