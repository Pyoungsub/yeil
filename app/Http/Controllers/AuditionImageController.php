<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AuditionImageController extends Controller
{
    //
    public function audition(Request $request)
    {
        $validation = $request->validate([
            'file' => 'file|mimes:jpeg,jpg,bmp,png',
        ]);
        if($request->hasfile('file'))
        {
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = date('ymd') . uniqid() . '.' . $extension;
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('file'));
            $image = $image->scaleDown(width:800);
            $image->save(base_path('public/storage/tmp/' . $fileName));
            $path = asset('storage/tmp/' . $fileName);
            return response()->json(['link' => $path]);
        }
    }
}
