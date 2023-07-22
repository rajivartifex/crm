<?php

namespace App\Http\Controllers;

use App\Models\CustLocation;
use App\Models\Customer;
use Illuminate\Http\Request;

class BusinessLocationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:business-location-list|business-location-create|business-location-edit|business-location-delete', ['only' => ['view_business_location','view_business_location_store']]);
         $this->middleware('permission:business-location-create', ['only' => ['view_business_location','view_business_location_store']]);
         $this->middleware('permission:business-location-edit', ['only' => ['view_business_location','view_business_location_store']]);
         $this->middleware('permission:business-location-delete', ['only' => ['view_business_location_delete']]);
    }

    public function view_business_location(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $location = CustLocation::find($request->loc_id);
        return view('pages.customers.profile_section.bus_location.bus_location',compact('customer','location'));
    }

    public function view_business_location_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['loc_id'])){
                $location = new CustLocation();
            }else{
                $location = CustLocation::find($request['ff']['loc_id']);
            }

            $location->cust_id = $request['ff']['cust_id'];
            $location->cust_location_name = $request['ff']['cust_location_name'];
            $location->cust_location_add1 = $request['ff']['cust_location_add1'];
            $location->cust_location_add2 = $request['ff']['cust_location_add2'];
            $location->cust_location_suburb = $request['ff']['cust_location_suburb'];
            $location->cust_location_state = $request['ff']['cust_location_state'];
            $location->cust_location_postcode = $request['ff']['cust_location_postcode'];
            $location->cust_location_country = $request['ff']['cust_location_country'];
            $location->save();

            session()->flash('success', 'Business location updated successfully!');
            session()->flash('title', 'Business Location');

            return response()->json([
                'data' => $location
            ]);
        }
    }

    public function view_business_location_delete(Request $request)
    {
        CustLocation::find($request->id)->delete();
        return response()->json(['success' => 'Business location deleted successfully!','title' => 'Business Location']);
    }
}
