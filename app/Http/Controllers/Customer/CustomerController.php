<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustAboutEmp;
use App\Models\CustCategories;
use App\Models\CustComment;
use App\Models\CustDescription;
use App\Models\CustDomain;
use App\Models\CustLocation;
use App\Models\CustLog;
use App\Models\CustMarketing;
use App\Models\Customer;
use App\Models\CustomerContactInfo;
use App\Models\CustPayment;
use App\Models\CustSubscription;
use App\Models\CustSupport;
use App\Models\CustWeb;
use App\Models\CustWorkingHours;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:working-hours-list', ['only' => ['view_working_hours']]);
         $this->middleware('permission:social-media-list', ['only' => ['view_social_media']]);
         $this->middleware('permission:log-list', ['only' => ['view_log']]);
         $this->middleware('permission:customer-delete', ['only' => ['customer_delete']]);
    }

    public function manageIndex()
    {
        $customer = Customer::all();
        return view('pages.customers.manage',compact('customer'));
    }

    public function addIndex(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $contactInfo = CustomerContactInfo::where('cust_id',$customer->id ?? '')->with('contact')->get();
        $custEmp = CustAboutEmp::where('cust_id',$customer->id ?? '')->get();
        $custDesc = CustDescription::where('cust_id',$customer->id ?? '')->get();
        $custCategories = CustCategories::with('categories')->where('cust_id',$customer->id ?? '')->get();
        $custPayments = CustPayment::where('cust_id',$customer->id ?? '')->get();
        $custWebs = CustWeb::where('cust_id',$customer->id ?? '')->get();
        $custComments = CustComment::where('cust_id',$customer->id ?? '')->get();
        $custDomains = CustDomain::where('cust_id',$customer->id ?? '')->get();
        $custSubscription = CustSubscription::with(['solution','paymentmode'])->where('cust_id',$customer->id ?? '')->get();
        $custMarketing = CustMarketing::with(['marketingtype','paymentmode'])->where('cust_id',$customer->id ?? '')->get();
        $custSupport = CustSupport::with(['marketingType','paymentMode'])->where('cust_id',$customer->id ?? '')->get();
        $custLogs = CustLog::where('cust_id',$customer->id ?? '')->get();
        $custLocation = CustLocation::where('cust_id',$customer->id ?? '')->get();
        $workingHours = CustWorkingHours::where('cust_id',$customer->id ?? '')->first();
        return view('pages.customers.customer_nav',compact('customer','contactInfo','custEmp','custDesc','custCategories','custPayments','custWebs','custComments','custDomains','custSubscription','custMarketing','custSupport','custLogs','custLocation','workingHours'));
    }

    public function view_business_location()
    {
        return view('pages.customers.profile_section.bus_location.bus_location');
    }

    public function view_working_hours()
    {
        return view('pages.customers.about_section.working_hours.working_hours');
    }

    public function view_social_media()
    {
        return view('pages.customers.web_section.web_tbl');
    }

    public function view_log()
    {
        return view('pages.customers.logs.log');
    }

    public function customer_delete(Request $request)
    {
        Customer::find($request->id)->delete();
        return response()->json(['success' => 'Customer deleted successfully!','title' => 'Customer']);
    }
}
