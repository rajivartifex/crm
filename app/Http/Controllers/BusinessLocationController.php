<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessLocationController extends Controller
{
    public function view_business_location()
    {
        return view('pages.customers.profile_section.bus_location.bus_location');
    }
}
