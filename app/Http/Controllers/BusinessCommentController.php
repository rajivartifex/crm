<?php

namespace App\Http\Controllers;

use App\Models\CustComment;
use App\Models\Customer;
use Illuminate\Http\Request;

class BusinessCommentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:comments-list|comments-create|comments-edit|comments-delete', ['only' => ['view_comment','view_comment_store']]);
         $this->middleware('permission:comments-create', ['only' => ['view_comment','view_comment_store']]);
         $this->middleware('permission:comments-edit', ['only' => ['view_comment','view_comment_store']]);
         $this->middleware('permission:comments-delete', ['only' => ['view_comment_delete']]);
    }
    public function view_comment(Request $request)
    {
        $customer = Customer::find($request->cust_id);
        $custComment = CustComment::find($request->c_id);
        return view('pages.customers.about_section.bus_comment.comment',compact('customer','custComment'));
    }

    public function view_comment_store(Request $request)
    {
        if($request->ajax()){
            if(empty($request['ff']['c_id'])){
                $comment = new CustComment();
                $comment->cust_id = $request['ff']['cust_id'];
            }else{
                $comment = CustComment::find($request['ff']['c_id']);
            }
            $comment->comment = $request['ff']['comment'];
            $comment->save();

            session()->flash('success', 'Business comment updated successfully!');
            session()->flash('title', 'Business Comment');

            return response()->json([
                'data' => $comment
            ]);
        }
    }

    public function view_comment_delete(Request $request)
    {
        CustComment::find($request->id)->delete();
        return response()->json(['success' => 'Business comment deleted successfully!','title' => 'Business Comment']);
    }

}
