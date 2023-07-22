<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\CustomerContactInfo;
use Illuminate\Http\Request;

class BusinessContactInfoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:business-contact-info-list|business-contact-info-create|business-contact-info-edit|business-contact-info-delete', ['only' => ['view_business_contact_info','business_contact_info_store']]);
         $this->middleware('permission:business-contact-info-create', ['only' => ['view_business_contact_info','business_contact_info_store']]);
         $this->middleware('permission:business-contact-info-edit', ['only' => ['view_business_contact_info','business_contact_info_store']]);
         $this->middleware('permission:business-contact-info-delete', ['only' => ['business_contact_info_delete']]);
    }

    public function view_business_contact_info(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custConInfo = CustomerContactInfo::with('contact')->find($request->cust_con_id);
        return view('pages.customers.profile_section.bus_contact_info.bus_contact_info',compact('custConInfo','customer'));
    }

    public function business_contact_info_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['cust_con_id'])){
                $contact = new Contact();
                $customerContactInfo = new CustomerContactInfo();
            }else{
                $contact = Contact::find($request['ff']['contact_id']);
                $customerContactInfo = CustomerContactInfo::find($request['ff']['cust_con_id']);
            }

            $contact->con_first_name = $request['ff']['con_first_name'];
            $contact->con_last_name = $request['ff']['con_last_name'];
            $contact->con_email = $request['ff']['con_email'];
            $contact->con_telephone = $request['ff']['con_telephone'];
            $contact->con_fax = $request['ff']['con_fax'];
            $contact->con_date = $request['ff']['con_date'];
            $contact->save();

            $customerContactInfo->cust_id = $request['ff']['cust_id'];
            $customerContactInfo->cust_con_id = $contact->id;
            $customerContactInfo->save();

            session()->flash('success', 'Business location contact info updated successfully!');
            session()->flash('title', 'Business Location Contact Info');

            return response()->json([
                'data' => $customerContactInfo
            ]);
        }
    }

    public function business_contact_info_delete(Request $request)
    {
        CustomerContactInfo::find($request->id)->delete();
        // CustomerContactInfo::onlyTrashed()->restore();
        return response()->json(['success' => 'Business location contact info deleted successfully!','title' => 'Business Location Contact Info']);
    }
}
