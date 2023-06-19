<?php

namespace App\Http\Controllers;

use App\Models\CustDescription;
use App\Models\Customer;
use Illuminate\Http\Request;

class BusinessCustDescController extends Controller
{
    public function view_description(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custDesc = CustDescription::find($request->desc_id);
        return view('pages.customers.about_section.description.description',compact('customer','custDesc'));
    }

    public function view_description_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['desc_id'])){
                $desc = new CustDescription();
            }else{
                $desc = CustDescription::find($request['ff']['desc_id']);
            }

            $desc->cust_id = $request['ff']['cust_id'];
            $desc->cust_short_desc = $request['ff']['cust_short_desc'];
            $desc->cust_long_desc = $request['ff']['cust_long_desc'];
            $desc->cust_alter_desc = $request['ff']['cust_alter_desc'];
            $desc->save();

            session()->flash('success', 'Business about description updated successfully!');
            session()->flash('title', 'Business About Description');

            return response()->json([
                'data' => $desc
            ]);
        }
    }

    public function view_description_delete(Request $request)
    {
        CustDescription::find($request->id)->delete();
        return response()->json(['success' => 'Business about description deleted successfully!','title' => 'Business About Description']);
    }
}
