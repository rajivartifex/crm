<?php

namespace App\Http\Controllers;

use App\Models\LoginImage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $login_image = LoginImage::first();
        return view('pages.settings.login-image', compact('login_image'));
    }

    public function login_image_upload(Request $request)
    {
        if ($request->id) {
            if (request()->hasFile('login_image')) {
                $file = $request->file('login_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->move(public_path('login_image'), $fileName);
                $loginImage = LoginImage::find($request->id);
                $loginImage->login_image = $fileName;
                $loginImage->save();
            }
        } else {
            if (request()->hasFile('login_image')) {
                $file = $request->file('login_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->move(public_path('login_image'), $fileName);
                $loginImage = new LoginImage();
                $loginImage->login_image = $fileName;
                $loginImage->save();
            }
        }


        return back()->with('success', 'File uploaded successfully.');
    }
}
