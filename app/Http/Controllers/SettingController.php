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
            $file = $request->file('login_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('login_image', $fileName, 'public');
            $loginImage = LoginImage::find($request->id);
            $loginImage->login_image = $fileName;
            $loginImage->save();
        } else {
            $file = $request->file('login_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->public_path('login_image', $fileName, 'public');
            $loginImage = new LoginImage();
            $loginImage->login_image = $fileName;
            $loginImage->save();
        }


        return back()->with('success', 'File uploaded successfully.');
    }
}
