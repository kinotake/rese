<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function postUpload(Request $request)
    {
        $dir = 'images';

        $file_name = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $shopId = $_POST["num"];

        $photo = new Photo();
        $photo->shop_id = $shopId;
        $photo->path = 'storage/' . $dir . '/' . $file_name;
        $photo->save();

        return redirect('/');
    }
}
