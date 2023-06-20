<?php

namespace App\Http\Controllers;

use App\Models\CustLog;
use Illuminate\Http\Request;

class BusinessLogController extends Controller
{
    public function view_log_store(Request $request)
    {
        if($request->ajax()){
            $logs = new CustLog();
            $logs->cust_id = $request['ff']['cust_id'];
            $logs->cust_log = $request['ff']['cust_log'];
            $logs->save();

            session()->flash('success', 'Business logs updated successfully!');
            session()->flash('title', 'Business Logs');

            return response()->json([
                'data' => $logs
            ]);
        }
    }
}
