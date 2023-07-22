<?php

namespace App\Http\Controllers;

use App\Models\CustDomain;
use App\Models\Customer;
use Illuminate\Http\Request;

class BusinessDomainController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:domain-list|domain-create|domain-edit|domain-delete', ['only' => ['view_domain','view_domain_store']]);
         $this->middleware('permission:domain-create', ['only' => ['view_domain','view_domain_store']]);
         $this->middleware('permission:domain-edit', ['only' => ['view_domain','view_domain_store']]);
         $this->middleware('permission:domain-delete', ['only' => ['view_domain_delete']]);
    }

    public function view_domain(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custDomain = CustDomain::find($request->dom_id);
        return view('pages.customers.domain.bus_domain',compact('customer','custDomain'));
    }

    public function view_domain_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['dom_id'])){
                $domain = new CustDomain();
            }else{
                $domain = CustDomain::find($request['ff']['dom_id']);
            }

            $domain->cust_id = $request['ff']['cust_id'];
            $domain->cust_domain_name = $request['ff']['cust_domain_name'];
            $domain->cust_domain_start_date = $request['ff']['cust_domain_start_date'];
            $domain->cust_domain_renewal_date = $request['ff']['cust_domain_renewal_date'];
            $domain->save();

            session()->flash('success', 'Business domain updated successfully!');
            session()->flash('title', 'Business Domain');

            return response()->json([
                'data' => $domain
            ]);
        }
    }

    public function view_domain_delete(Request $request)
    {
        CustDomain::find($request->id)->delete();
        return response()->json(['success' => 'Business domain deleted successfully!','title' => 'Business Domain']);
    }
}
