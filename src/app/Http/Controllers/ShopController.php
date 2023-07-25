<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Place;
use App\Models\Like;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index()
    {
        $allShops = Shop::all();

        $categories = Category::all();
        $places = Place::all();

        return view('all', compact('allShops','categories','places'));
    }

    public function search(Request $request)
    {   
        $category_id = $request->input('category_id');
        $place_id = $request->input('place_id');
        $keyword = $request->input('keyword');

        $cond = ['category_id' => $category_id, 'place_id' => $place_id ];

        $categories = Category::all();
        $places = Place::all();

        if($category_id != "selected" && $place_id != "selected" && $keyword != null)
        {
            $allShops = Shop::where($cond)->where('name','like','%'.$keyword.'%')->get();
    
            return view('all', compact('allShops','categories','places'));
        }
        elseif($category_id != "selected" && $place_id != "selected" && $keyword == null)
        {
            $allShops = Shop::where($cond)->get();

            return view('all', compact('allShops','categories','places'));
        }
        elseif($category_id != "selected" && $place_id == "selected" && $keyword != null)
        {   
            $allShops = Shop::where('category_id','=',$category_id)->where('name','like','%'.$keyword.'%')->get();

            return view('all', compact('allShops','categories','places'));
        }
        elseif($category_id == "selected" && $place_id != "selected" && $keyword != null)
        {
            $allShops = Shop::where('place_id','=',$place_id)->where('name','like','%'.$keyword.'%')->get();

            return view('all', compact('allShops','categories','places'));
        }
        elseif($category_id != "selected" && $place_id == "selected" && $keyword == null)
        {
            $allShops = Shop::where('category_id','=',$category_id)->get();

            return view('all', compact('allShops','categories','places'));
        }
        elseif($category_id == "selected" && $place_id != "selected" && $keyword == null)
        {
            $allShops = Shop::where('place_id','=',$place_id)->get();

            return view('all', compact('allShops','categories','places'));
        }
        elseif($category_id == "selected" && $place_id == "selected" && $keyword != null)
        {
            $allShops = Shop::where('name','like','%'.$keyword.'%')->get();

            return view('all', compact('allShops','categories','places'));
        }
        else
        {
            $allShops = Shop::all();
            $noPost = "検索欄に情報を入れてください。";

            return view('all', compact('allShops','noPost','categories','places'));
        }
    }

    public function detail($id)
    {
        $shopId = $id;
        $shopData = Shop::where('id',$shopId)->first();
        $checkLogin = Auth::check();
        
        // 可変（時間）
        $start = 9;
        $end = 22;
        $worktimes = [];
        for ($count = $start; $count <= $end; $count++)
        {

            $zero = "%02d";
            $hours=sprintf($zero, $count);
            $item = $hours.":00";
            $worktimes[] = $item;
        }

        // 可変（人数）
        $min = 1;
        $max = 15;
        $people = [];
        for ($count = $min; $count <= $max; $count++)
        {
            $people[] = $count;
        }

        return view('datail', compact('shopData','worktimes','people','checkLogin'));
    }

    public function getMypage()
    {
        $today = Carbon::now();
        $who= Auth::id();
        $userData = User::where('id',$who)->first();
        
        $reserveDatas = Reserve::whereDate('date','>',$today)->get();
        $likeDatas = Like::where('user_id',$who)->get();
    
        return view('mypage')->with(compact('userData','reserveDatas','likeDatas'));
    }

    public function getReschedule($shop_id,$id)
    {
        $reserveId = $id;
        $reservedData = Reserve::where('id',$reserveId)->first();
        $shopId = $shop_id;
        $shopData = Shop::where('id',$shopId)->first();
        
        // 可変（時間）
        $start = 9;
        $end = 22;
        $worktimes = [];
        for ($count = $start; $count <= $end; $count++)
        {

            $zero = "%02d";
            $hours=sprintf($zero, $count);
            $item = $hours.":00";
            $worktimes[] = $item;
        }

        // 可変（人数）
        $min = 1;
        $max = 15;
        $people = [];
        for ($count = $min; $count <= $max; $count++)
        {
            $people[] = $count;
        }

        return view('reschedule', compact('shopData','worktimes','people','reservedData'));
    }
    public function getCancel($shop_id,$id)
    {
        $reserveId = $id;
        $reservedData = Reserve::where('id',$reserveId)->first();
        $shopId = $shop_id;
        $shopData = Shop::where('id',$shopId)->first();
        

        return view('cancel', compact('shopData','reservedData'));
    }
    public function getWent()
    {
        $today = Carbon::now();
        $wentReserveDatas = Reserve::whereDate('date','<',$today)->get();

        $who= Auth::id();
        $userData = User::where('id',$who)->first();

        return view('went', compact('wentReserveDatas','userData'));
    }
    public function getAssessment($id)
    {
        $reserveId = $id;
        $shopData = Shop::where('id',$shopId)->first();
        

        return view('datail', compact('shopData'));
    }

}