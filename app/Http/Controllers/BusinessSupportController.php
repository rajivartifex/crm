<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustSupport;
use App\Models\Marketing;
use App\Models\PaymentMode;
use Illuminate\Http\Request;

class BusinessSupportController extends Controller
{
    public function view_support(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custSupport = CustSupport::find($request->sp_id);
        $marketingType = Marketing::all();
        $paymentMode = PaymentMode::all();
        return view('pages.customers.support.bus_support',compact('customer','custSupport','marketingType','paymentMode'));
    }

    public function view_support_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['sp_id'])){
                $support = new CustSupport();
            }else{
                $support = CustSupport::find($request['ff']['sp_id']);
            }

            $support->cust_id = $request['ff']['cust_id'];
            $support->cust_sup_product_name = $request['ff']['cust_sup_product_name'];
            $support->cust_sup_type_id = $request['ff']['cust_sup_type_id'];
            $support->cust_sup_start_date = $request['ff']['cust_sup_start_date'];
            $support->cust_sup_renewal_date = $request['ff']['cust_sup_renewal_date'];
            $support->cust_sup_plan = $request['ff']['cust_sup_plan'];
            $support->cust_sup_pricing = $request['ff']['cust_sup_pricing'];
            $support->cust_sup_payment_mode_id = $request['ff']['cust_sup_payment_mode_id'];
            $support->save();

            session()->flash('success', 'Business support updated successfully!');
            session()->flash('title', 'Business Support');

            return response()->json([
                'data' => $support
            ]);
        }
    }

    public function view_support_delete(Request $request)
    {
        CustSupport::find($request->id)->delete();
        return response()->json(['success' => 'Business support deleted successfully!','title' => 'Business Support']);
    }
}
