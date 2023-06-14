<?php

namespace App\Http\Controllers;

use App\Models\CustAboutEmp;
use App\Models\Customer;
use Illuminate\Http\Request;

class BusinessAboutEmpController extends Controller
{
    public function view_no_of_emp(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custEmp = CustAboutEmp::find($request->emp_id);
        return view('pages.customers.about_section.bus_emp.bus_emp',compact('customer','custEmp'));
    }

    public function view_no_of_emp_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['emp_id'])){
                $emp = new CustAboutEmp();
            }else{
                $emp = CustAboutEmp::find($request['ff']['emp_id']);
            }

            $emp->cust_id = $request['ff']['cust_id'];
            $emp->cust_of_emps = $request['ff']['cust_of_emps'];
            $emp->save();

            session()->flash('success', 'Business about employees updated successfully!');
            session()->flash('title', 'Business About Employees');

            return response()->json([
                'data' => $emp
            ]);
        }
    }

    public function view_no_of_emp_delete(Request $request)
    {
        CustAboutEmp::find($request->id)->delete();
        return response()->json(['success' => 'Business about employee deleted successfully!','title' => 'Business About Employee']);
    }
}
