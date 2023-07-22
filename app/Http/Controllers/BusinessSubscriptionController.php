<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustSubscription;
use App\Models\PaymentMode;
use App\Models\Solution;
use Illuminate\Http\Request;

class BusinessSubscriptionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:hosting-subscription-list|hosting-subscription-create|hosting-subscription-edit|hosting-subscription-delete', ['only' => ['view_subscription','view_subscription_store']]);
         $this->middleware('permission:hosting-subscription-create', ['only' => ['view_subscription','view_subscription_store']]);
         $this->middleware('permission:hosting-subscription-edit', ['only' => ['view_subscription','view_subscription_store']]);
         $this->middleware('permission:hosting-subscription-delete', ['only' => ['view_subscription_delete']]);
    }

    public function view_subscription(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custSub = CustSubscription::find($request->sub_id);
        $solutionType = Solution::all();
        $paymentMode = PaymentMode::all();
        return view('pages.customers.subscription.bus_subscription',compact('customer','custSub','solutionType','paymentMode'));
    }

    public function view_subscription_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['sub_id'])){
                $subscription = new CustSubscription();
            }else{
                $subscription = CustSubscription::find($request['ff']['sub_id']);
            }

            $subscription->cust_id = $request['ff']['cust_id'];
            $subscription->cust_sub_website_name = $request['ff']['cust_sub_website_name'];
            $subscription->cust_sub_domain_name = $request['ff']['cust_sub_domain_name'];
            $subscription->cust_sub_solution_id = $request['ff']['cust_sub_solution_id'];
            $subscription->cust_sub_plan = $request['ff']['cust_sub_plan'];
            $subscription->cust_sub_pricing = $request['ff']['cust_sub_pricing'];
            $subscription->cust_sub_payment_mode_id = $request['ff']['cust_sub_payment_mode_id'];
            $subscription->cust_sub_start_date = $request['ff']['cust_sub_start_date'];
            $subscription->cust_sub_renewal_date = $request['ff']['cust_sub_renewal_date'];
            $subscription->save();

            session()->flash('success', 'Business hosting subscription updated successfully!');
            session()->flash('title', 'Business Hosting Subscription');

            return response()->json([
                'data' => $subscription
            ]);
        }
    }

    public function view_subscription_delete(Request $request)
    {
        CustSubscription::find($request->id)->delete();
        return response()->json(['success' => 'Business hosting subscription deleted successfully!','title' => 'Business Hosting Subscription']);
    }
}
