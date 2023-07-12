<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function profile_update()
    {
        $user = \Auth::user();
        return view('pages.settings.profile-settings',compact('user'));
    }

    public function password_reset()
    {
        return view('pages.settings.reset');
    }

    public function change_password(Request $request)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|same:new_password',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function profile_store(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with("success","Profile Updated successfully!");
    }
}
