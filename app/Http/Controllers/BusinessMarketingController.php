<?php

namespace App\Http\Controllers;

use App\Models\CustMarketing;
use App\Models\Customer;
use App\Models\Marketing;
use App\Models\PaymentMode;
use Illuminate\Http\Request;

class BusinessMarketingController extends Controller
{
    public function view_marketing(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custMarketing = CustMarketing::find($request->mk_id);
        $marketingType = Marketing::all();
        $paymentMode = PaymentMode::all();
        return view('pages.customers.marketing.bus_marketing',compact('customer','custMarketing','marketingType','paymentMode'));
    }

    public function view_marketing_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['mk_id'])){
                $marketing = new CustMarketing();
            }else{
                $marketing = CustMarketing::find($request['ff']['mk_id']);
            }

            $marketing->cust_id = $request['ff']['cust_id'];
            $marketing->cust_mark_domain_name = $request['ff']['cust_mark_domain_name'];
            $marketing->cust_mark_type_id = $request['ff']['cust_mark_type_id'];
            $marketing->cust_mark_start_date = $request['ff']['cust_mark_start_date'];
            $marketing->cust_mark_renewal_date = $request['ff']['cust_mark_renewal_date'];
            $marketing->cust_mark_plan = $request['ff']['cust_mark_plan'];
            $marketing->cust_mark_pricing = $request['ff']['cust_mark_pricing'];
            $marketing->cust_mark_payment_mode_id = $request['ff']['cust_mark_payment_mode_id'];
            $marketing->save();

            session()->flash('success', 'Business marketing updated successfully!');
            session()->flash('title', 'Business Marketing');

            return response()->json([
                'data' => $marketing
            ]);
        }
    }

    public function view_marketing_delete(Request $request)
    {
        CustMarketing::find($request->id)->delete();
        return response()->json(['success' => 'Business marketing deleted successfully!','title' => 'Business Marketing']);
    }
}
