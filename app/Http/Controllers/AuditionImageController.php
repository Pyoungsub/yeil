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
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,bmp|max:5120',
        ]);

        $file = $request->file('file');

        $fileName = date('ymd') . uniqid() . '.' . $file->extension();

        $manager = new ImageManager(new Driver());
        $image = $manager->read($file)->scaleDown(width: 800);

        $savePath = storage_path('app/public/tmp/' . $fileName);
        $image->save($savePath);

        return response()->json([
            'link' => asset('storage/tmp/' . $fileName),
        ]);
    }
    public function promotion(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,bmp|max:5120',
        ]);

        $file = $request->file('file');

        $fileName = date('ymd') . uniqid() . '.' . $file->extension();

        $manager = new ImageManager(new Driver());
        $image = $manager->read($file)->scaleDown(width: 800);

        $savePath = storage_path('app/public/tmp/' . $fileName);
        $image->save($savePath);

        return response()->json([
            'link' => asset('storage/tmp/' . $fileName),
        ]);
    }
}
