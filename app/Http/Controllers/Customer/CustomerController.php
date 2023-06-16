<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustAboutEmp;
use App\Models\CustCategories;
use App\Models\CustDescription;
use App\Models\Customer;
use App\Models\CustomerContactInfo;
use App\Models\CustPayment;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function manageIndex()
    {
        $customer = Customer::all();
        return view('pages.customers.manage',compact('customer'));
    }

    public function addIndex(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $contactInfo = CustomerContactInfo::where('cust_id',$customer->id ?? '')->with('contact')->get();
        $custEmp = CustAboutEmp::all();
        $custDesc = CustDescription::all();
        $custCategories = CustCategories::with('categories')->get();
        $custPayments = CustPayment::all();
        return view('pages.customers.customer_nav',compact('customer','contactInfo','custEmp','custDesc','custCategories','custPayments'));
    }

    public function view_business_location()
    {
        return view('pages.customers.profile_section.bus_location.bus_location');
    }

    public function view_working_hours()
    {
        return view('pages.customers.about_section.working_hours.working_hours');
    }

    public function view_web()
    {
        return view('pages.customers.web_section.web');
    }
}
