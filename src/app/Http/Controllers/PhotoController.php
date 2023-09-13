<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function postUpload(Request $request)
    {   
        $shop = $_POST["num"];

        $dir = 'images';
        $photoData = Photo::where('shop_id', '=', $shop)->first();

        if($request->file('image') == null)
        {
            $error="画像を選択してください。";

            return redirect('/owner/edit'.'/'.$shop)->with(compact('error'));
        }
        elseif($photoData === null){

            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);

            $photo = new Photo();
            $photo->shop_id = $shop;
            $photo->path = 'storage/' . $dir . '/' . $file_name;
            $photo->save();

            $message="新規登録が完了しました。";

            return redirect('/owner')->with(compact('message'));
        }
        else
        {
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);

            $photoId = $photoData->id;
            $photo = Photo::find($photoId);
            $photo->path = 'storage/' . $dir . '/' . $file_name;
            $photo->save();

            $message="画像が変更されました。";

            return redirect('/owner')->with(compact('message'));
        }
    }
}
