<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function editCategory(Request $request)
    {   
        $shopId = $_POST["num"];

        $categoryData = Category::where('shop_id', '=', $shopId)->first();

        $categoryId = $categoryData->id;

        $category = Category::find($categoryId);
        $category->path = 'storage/' . $dir . '/' . $file_name;
        $category->save();

        $message="画像が変更されました。";

        return redirect('/owner')->with(compact('message'));
        
    }
}
