<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustPayment;
use App\Models\Payment;
use Illuminate\Http\Request;

class BusinessPaymentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:payment-accepted-list|payment-accepted-create|payment-accepted-edit|payment-accepted-delete', ['only' => ['view_payment_method','view_payment_method_store']]);
         $this->middleware('permission:payment-accepted-create', ['only' => ['view_payment_method','view_payment_method_store']]);
         $this->middleware('permission:payment-accepted-edit', ['only' => ['view_payment_method','view_payment_method_store']]);
         $this->middleware('permission:payment-accepted-delete', ['only' => ['view_payment_method_delete']]);
    }

    public function view_payment_method(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custPayment = CustPayment::find($request->pay_id);
        $payments = Payment::all();
        return view('pages.customers.payment_section.payment_method',compact('customer','custPayment','payments'));
    }

    public function view_payment_method_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['pay_id'])){
                $payment = new CustPayment();
                $payment->cust_id = $request['ff']['cust_id'];
                $payment->cust_payment_id = $request['ff']['cust_payment_id'];
                $payment->save();
            }else{
                $payment = CustPayment::find($request['ff']['pay_id']);
                $payment->cust_id = $request['ff']['cust_id'];
                $payment->cust_payment_id = $request['ff']['cust_payment_id'];
                $payment->save();
            }

            session()->flash('success', 'Business payment updated successfully!');
            session()->flash('title', 'Business Payment');

            return response()->json([
                'data' => $payment
            ]);
        }
    }

    public function view_payment_method_delete(Request $request)
    {
        CustPayment::find($request->id)->delete();
        return response()->json(['success' => 'Business payment deleted successfully!','title' => 'Business Payment']);
    }
}
