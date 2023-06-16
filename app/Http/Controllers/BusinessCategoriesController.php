<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\CustCategories;
use App\Models\Customer;
use App\Models\ServiceTag;
use Illuminate\Http\Request;

class BusinessCategoriesController extends Controller
{
    public function view_of_business_category(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custCategory = CustCategories::find($request->cat_id);
        $categories = Categories::all();
        $service_tags = ServiceTag::where('cust_categories_id',$request->cat_id)->get();
        return view('pages.customers.about_section.bus_category.bus_category',compact('customer','custCategory','categories','service_tags'));
    }

    public function view_of_business_category_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['cat_id'])){
                $cat = new CustCategories();
            }else{
                $cat = CustCategories::find($request['ff']['cat_id']);
            }

            $cat->cust_id = $request['ff']['cust_id'];
            $cat->categories_id = $request['ff']['categories_id'];
            $cat->save();

            $service_tag_list = json_decode($request->service_tag_list);
            if($service_tag_list){
                foreach($service_tag_list as $list){
                    if($list->serviceId != 0){
                        $serviceTags = ServiceTag::find($list->serviceId);
                        $serviceTags->cust_categories_id = $cat->id ?? '';
                        $serviceTags->service_tag = $list->serviceTags ?? '';
                        $serviceTags->save();
                        if($list->st_delete == '-1'){
                            $serviceTags->delete();
                        }
                    }else{
                        $serviceTags = new ServiceTag();
                        $serviceTags->cust_categories_id = $cat->id ?? '';
                        $serviceTags->service_tag = $list->serviceTags ?? '';
                        $serviceTags->save();
                        if($list->st_delete == '-1'){
                            $serviceTags->delete();
                        }
                    }
                }
            }

            session()->flash('success', 'Business category updated successfully!');
            session()->flash('title', 'Business Category');

            return response()->json([
                'data' => $cat
            ]);
        }
    }

    public function view_of_business_category_delete(Request $request)
    {
        CustCategories::find($request->id)->delete();
        ServiceTag::where('cust_categories_id',$request->id)->delete();
        return response()->json(['success' => 'Business category deleted successfully!','title' => 'Business Category']);
    }
}
