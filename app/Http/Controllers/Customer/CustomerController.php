<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerContactInfo;
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
        return view('pages.customers.customer_nav',compact('customer','contactInfo'));
    }


    public function view_business_location()
    {
        return view('pages.customers.profile_section.bus_location.bus_location');
    }

    public function view_no_of_emp()
    {
        return view('pages.customers.about_section.bus_emp.bus_emp');
    }

    public function view_of_business_category()
    {
        return view('pages.customers.about_section.bus_category.bus_category');
    }

    public function view_working_hours()
    {
        return view('pages.customers.about_section.working_hours.working_hours');
    }

    public function view_description()
    {
        return view('pages.customers.about_section.description.description');
    }

    public function view_payment_method()
    {
        return view('pages.customers.payment_section.payment_method');
    }

    public function view_web()
    {
        return view('pages.customers.web_section.web');
    }
}
