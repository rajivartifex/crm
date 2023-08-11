<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Marketing;
use App\Models\Payment;
use App\Models\PaymentMode;
use App\Models\Solution;
use Illuminate\Http\Request;

class EnumSettingController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        $solutions = Solution::all();
        $paymentModes = PaymentMode::all();
        $marketings = Marketing::all();
        $categories = Categories::all();
        return view('pages.settings.enum-settings', compact('payments', 'solutions', 'paymentModes', 'marketings', 'categories'));
    }

    public function payment_form(Request $request)
    {
        $payment = Payment::find($request->pay_id);
        return view('pages.settings.payment_form', compact('payment'));
    }

    public function payment_store(Request $request)
    {
        if ($request->ajax()) {
            if ($request->pay_id) {
                $payment = Payment::find($request->pay_id);
                $payment->payment = $request->payment ?? '';
                $payment->save();
            } else {
                $payment = new Payment();
                $payment->payment = $request->payment ?? '';
                $payment->save();
            }

            session()->flash('success', 'Payment created successfully!');
            session()->flash('title', 'Payment');

            return response()->json([
                'data' => $payment
            ]);
        }
    }

    public function payment_delete(Request $request)
    {
        Payment::find($request->id)->delete();
        // CustomerContactInfo::onlyTrashed()->restore();
        return response()->json(['success' => 'Payment deleted successfully!', 'title' => 'Payment']);
    }

    public function solution_form(Request $request)
    {
        $solution = Solution::find($request->sol_id);
        return view('pages.settings.solution_form', compact('solution'));
    }

    public function solution_store(Request $request)
    {
        if ($request->ajax()) {
            if ($request->sol_id) {
                $solution = Solution::find($request->sol_id);
                $solution->type = $request->solution_type ?? '';
                $solution->save();
            } else {
                $solution = new Solution();
                $solution->type = $request->solution_type ?? '';
                $solution->save();
            }

            session()->flash('success', 'Solution Type created successfully!');
            session()->flash('title', 'Solution Type');

            return response()->json([
                'data' => $solution
            ]);
        }
    }

    public function solution_delete(Request $request)
    {
        Solution::find($request->id)->delete();
        return response()->json(['success' => 'Solution Type deleted successfully!', 'title' => 'Solution Type']);
    }

    public function paymentmode_form(Request $request)
    {
        $paymentmode = PaymentMode::find($request->pay_mode_id);
        return view('pages.settings.paymentmode_form', compact('paymentmode'));
    }

    public function paymentmode_store(Request $request)
    {
        if ($request->ajax()) {
            if ($request->pay_mode_id) {
                $paymentMode = PaymentMode::find($request->pay_mode_id);
                $paymentMode->type = $request->type ?? '';
                $paymentMode->save();
            } else {
                $paymentMode = new PaymentMode();
                $paymentMode->type = $request->type ?? '';
                $paymentMode->save();
            }

            session()->flash('success', 'Payment mode created successfully!');
            session()->flash('title', 'Payment Mode');

            return response()->json([
                'data' => $paymentMode
            ]);
        }
    }

    public function paymentmode_delete(Request $request)
    {
        PaymentMode::find($request->id)->delete();
        // CustomerContactInfo::onlyTrashed()->restore();
        return response()->json(['success' => 'Payment mode deleted successfully!', 'title' => 'Payment Mode']);
    }

    public function marketing_form(Request $request)
    {
        $marketing = Marketing::find($request->mark_id);
        return view('pages.settings.marketing_form', compact('marketing'));
    }

    public function marketing_store(Request $request)
    {
        if ($request->ajax()) {
            if ($request->mark_id) {
                $marketing = Marketing::find($request->mark_id);
                $marketing->type = $request->type ?? '';
                $marketing->save();
            } else {
                $marketing = new Marketing();
                $marketing->type = $request->type ?? '';
                $marketing->save();
            }

            session()->flash('success', 'Marketing type created successfully!');
            session()->flash('title', 'Marketing Type');

            return response()->json([
                'data' => $marketing
            ]);
        }
    }

    public function marketing_delete(Request $request)
    {
        Marketing::find($request->id)->delete();
        // CustomerContactInfo::onlyTrashed()->restore();
        return response()->json(['success' => 'Marketing type deleted successfully!', 'title' => 'Marketing Type']);
    }

    public function category_form(Request $request)
    {
        $category = Categories::find($request->category_id);
        return view('pages.settings.category_form', compact('category'));
    }

    public function category_store(Request $request)
    {
        if ($request->ajax()) {
            if ($request->category_id) {
                $category = Categories::find($request->category_id);
                $category->cat_name = $request->cat_name ?? '';
                $category->save();
            } else {
                $category = new Categories();
                $category->cat_name = $request->cat_name ?? '';
                $category->save();
            }

            session()->flash('success', 'Category created successfully!');
            session()->flash('title', 'Category');

            return response()->json([
                'data' => $category
            ]);
        }
    }

    public function category_delete(Request $request)
    {
        Categories::find($request->id)->delete();
        return response()->json(['success' => 'Category deleted successfully!', 'title' => 'Category']);
    }
}
