<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    protected function uploadImage($file){
        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";
        $filename = $file->getClientOriginalName();

        $file = $file->move(public_path($imagePath),$filename);

        $sizes = ["300" , "600" , "900"];

        Image::make($file->getRealPath())->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($imagePath) . "300_" . $filename );
    }
}
