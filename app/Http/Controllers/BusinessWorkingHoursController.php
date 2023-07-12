<?php

namespace App\Http\Controllers;

use App\Models\CustWorkingHours;
use Illuminate\Http\Request;

class BusinessWorkingHoursController extends Controller
{
    public function working_hours_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['working_hours_id'])){
                $workingHours = new CustWorkingHours();
                $workingHours->cust_id = $request['ff']['cust_id'];
                $workingHours->cust_working_hours = json_encode($request['opening']);
                $workingHours->save();
            }else{
                $workingHours = CustWorkingHours::find($request['ff']['working_hours_id']);
                $workingHours->cust_working_hours = $request->opening;
                $workingHours->save();
            }
            session()->flash('success', 'Business working hours updated successfully!');
            session()->flash('title', 'Business Working Hours');

            return response()->json([
                'data' => $workingHours
            ]);
        }
    }
}
