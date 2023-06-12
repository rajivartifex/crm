<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function manageIndex()
    {
        return view('pages.customers.manage');
    }

    public function addIndex()
    {
        return view('pages.customers.customer_nav');
    }

    public function view_business_identity()
    {
        return view('pages.customers.profile_section.bus_identity');
    }
    public function view_business_location()
    {
        return view('pages.customers.profile_section.bus_location');
    }

    public function view_business_contact_info()
    {
        return view('pages.customers.profile_section.bus_contact_info');
    }
    public function view_no_of_emp()
    {
        return view('pages.about_section.bus_emp');
    }

    public function view_of_business_category()
    {
        return view('pages.about_section.bus_category');
    }

    public function view_working_hours()
    {
        return view('pages.about_section.working_hours');
    }

    public function view_description()
    {
        return view('pages.about_section.description');
    }
}
