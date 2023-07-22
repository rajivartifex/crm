<?php

namespace App\Http\Controllers;

use App\Models\CustWeb;
use Illuminate\Http\Request;

class BusinessWebController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:social-media-edit', ['only' => ['view_web_store']]);
    }

    public function view_web_store(Request $request)
    {
        if($request->ajax()){
            $web_data = "";
            $media_list = json_decode($request->media_list);
            if($media_list){
                foreach($media_list as $list){
                    if($list->webId != 0){
                        $web = CustWeb::find($list->webId);
                        $web->cust_media_name = $list->cust_media_name ?? '';
                        $web->cust_media_link = $list->cust_media_link ?? '';
                        $web->save();
                        if($list->web_delete == '-1'){
                            $web->delete();
                        }
                        $web_data = $web;
                    }else{
                        $web = new CustWeb();
                        $web->cust_id = $list->cust_id ?? '';
                        $web->cust_media_name = $list->cust_media_name ?? '';
                        $web->cust_media_link = $list->cust_media_link ?? '';
                        $web->save();
                        if($list->web_delete == '-1'){
                            $web->delete();
                        }
                        $web_data = $web;
                    }
                }
            }

            session()->flash('success', 'Business web updated successfully!');
            session()->flash('title', 'Business Web');

            return response()->json([
                'data' => $web_data
            ]);
        }
    }
}
