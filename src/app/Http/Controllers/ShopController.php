<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Place;
use App\Models\Like;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Owner;
use App\Models\Price;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ShopsImport;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $allShops = $shops->sortBy('average');
        $allShops = $shops->sortByDesc('average');
        $allShops = $shops->shuffle();

        $categories = Category::all();
        $places = Place::all();
        $sort = "random";

        return view('all', compact('allShops','categories','places','sort'));
    }

    public function search(Request $request)
    {   
        $category_id = $request->input('category_id');
        $place_id = $request->input('place_id');
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');

        $cond = ['category_id' => $category_id, 'place_id' => $place_id ];

        $categories = Category::all();
        $places = Place::all();

        $seachedArea = Place::find($place_id);
        $seachedGenre = Category::find($category_id);

        if($category_id != "selected" && $place_id != "selected" && $keyword != null)
        {
            $shops = Shop::where($cond)->where('name','like','%'.$keyword.'%')->get();
            $allShops = $this->sort($shops,$sort);

            return view('all', compact('allShops','categories','places','seachedArea','seachedGenre','keyword','sort'));
        }
        elseif($category_id != "selected" && $place_id != "selected" && $keyword == null)
        {
            $shops = Shop::where($cond)->get();
            $allShops = $this->sort($shops,$sort);

            return view('all', compact('allShops','categories','places','seachedArea','seachedGenre','sort'));
        }
        elseif($category_id != "selected" && $place_id == "selected" && $keyword != null)
        {   
            $shops = Shop::where('category_id','=',$category_id)->where('name','like','%'.$keyword.'%')->get();
            $allShops = $this->sort($shops,$sort);

            return view('all', compact('allShops','categories','places','seachedGenre','keyword','sort'));
        }
        elseif($category_id == "selected" && $place_id != "selected" && $keyword != null)
        {
            $shops = Shop::where('place_id','=',$place_id)->where('name','like','%'.$keyword.'%')->get();
            $allShops = $this->sort($shops,$sort);

            return view('all', compact('allShops','categories','places','seachedArea','keyword','sort'));
        }
        elseif($category_id != "selected" && $place_id == "selected" && $keyword == null)
        {
            $shops = Shop::where('category_id','=',$category_id)->get();
            $allShops = $this->sort($shops,$sort);

            return view('all', compact('allShops','categories','places','seachedGenre','sort'));
        }
        elseif($category_id == "selected" && $place_id != "selected" && $keyword == null)
        {
            $shops = Shop::where('place_id','=',$place_id)->get();
            $allShops = $this->sort($shops,$sort);

            return view('all', compact('allShops','categories','places','seachedArea','sort'));
        }
        elseif($category_id == "selected" && $place_id == "selected" && $keyword != null)
        {
            $shops = Shop::where('name','like','%'.$keyword.'%')->get();
            $allShops = $this->sort($shops,$sort);

            return view('all', compact('allShops','categories','places','keyword','sort'));
        }
        elseif($category_id == "selected" && $place_id == "selected" && $keyword == null && $sort == "random")
        {

            return redirect('/');
        }
        else
        {
            $shops = Shop::all();
            $allShops = $this->sort($shops,$sort);

            return view('all', compact('allShops','categories','places','sort'));
        }
    }

    public function sort($shops,$sort){

        if($sort == "random"){

            $allShops = $shops->sortBy('average');

        }elseif($sort == "high_score"){

            $allShops = $shops->sortByDesc('average');

            return $allShops;
        }
        else{
            
            $allShops = $shops->sortBy('average');

        }

        return $allShops;

    }

    public function detail($shop_id)
    {
        $shopId = $shop_id;
        $shopData = Shop::where('id',$shopId)->first();
        $checkLogin = Auth::check();
        
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

        $min = 1;
        $max = 15;
        $people = [];
        for ($count = $min; $count <= $max; $count++)
        {
            $people[] = $count;
        }

        $shopPosts = Shop::find($shopId)->posts;

        $shopPrices = Price::where('shop_id',$shopId)->get();

        return view('detail', compact('shopData','worktimes','people','checkLogin','shopPosts','shopPrices'));
    }

    public function getMypage()
    {
        $today = Carbon::now();
        $who= Auth::id();
        $userData = User::where('id',$who)->first();
        
        $reserveDatas = Reserve::whereDate('date','>=',$today)->get();
        $likeDatas = Like::where('user_id',$who)->get();
    
        return view('mypage')->with(compact('userData','reserveDatas','likeDatas'));
    }

    public function getReschedule($shop_id,$reserve_id)
    {
        $reserveId = $reserve_id;
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

    public function getCancel($shop_id,$reserve_id)
    {
        $reserveId = $reserve_id;
        $reservedData = Reserve::where('id',$reserveId)->first();
        $shopId = $shop_id;
        $shopData = Shop::where('id',$shopId)->first();
        

        return view('cancel', compact('shopData','reservedData'));
    }

    public function getWent()
    {
        $today = Carbon::now();
        $wentReserveDatas = Reserve::whereDate('date','<',$today)->where('user_id','=',Auth::id())->get();

        $who= Auth::id();
        $userData = User::where('id',$who)->first();

        $likeDatas = Like::where('user_id',$who)->get();

        return view('went', compact('wentReserveDatas','userData','likeDatas'));
    }

    public function getAssessment($reserve_id)
    {
        $reserveId = $reserve_id;
        $ReserveDatas = Reserve::where('id',$reserveId)->first();
        $shopId = $ReserveDatas->shop_id;
        $shopData = Shop::where('id',$shopId)->first();

        return view('assessment', compact('shopData'));
    }

    public function getDetailAssessment($shop_id)
    {
        $shopId = $shop_id;
        $shopData = Shop::find($shop_id);

        return view('assessment', compact('shopData'));
    }

    public function makeShop(ShopRequest $request)
    {
        $post = $request->all();

        $userId = $_POST["owner_id"];
        $postName = $_POST["name"];
        $categoryId = $_POST["category_id"];
        $placeId = $_POST["place_id"];
        $comment = $_POST["comment"];
        
        $shop = new Shop();
        $shop->user_id = $userId;
        $shop->name = $postName;
        $shop->category_id = $categoryId;
        $shop->place_id = $placeId;
        $shop->comment = $comment;
        $shop->save();

        $message = "店舗が追加されました。";

        return redirect('/owner')->with(compact('message'));
    }

    public function editCategory(Request $request)
    {   
        $shopId = $_POST["num"];
        $categoryId = $_POST["category_id"];

        if($categoryId == null)
        {
            $error="ジャンルを選択してください。";

            return redirect('/owner/edit'.'/'.$shopId)->with(compact('error'));
        }
        else{

        Shop::where('id','=',$shopId)->update([
            'category_id' => $categoryId,
        ]);

        $message="ジャンルが変更されました。";

        return redirect('/owner')->with(compact('message'));
        }
        
    }

    public function editPlace(Request $request)
    {   
        $shopId = $_POST["num"];
        $placeId = $_POST["place_id"];

        if($placeId == null)
        {
            $error="エリアを選択してください。";

            return redirect('/owner/edit'.'/'.$shopId)->with(compact('error'));
        }
        else
        {
        
        Shop::where('id','=',$shopId)->update([
            'place_id' => $placeId,
        ]);

        $message="エリアが変更されました。";

        return redirect('/owner')->with(compact('message'));
        }
        
    }

    public function editComment(Request $request)
    {   
        $shopId = $_POST["num"];
        $postComment = $_POST["comment"];

        $commentLength=mb_strlen($postComment);

        if($postComment == null)
        {
            $error="コメントを記入してください。";

            return redirect('/owner/edit'.'/'.$shopId)->with(compact('error'));
        }
        elseif($commentLength > 120)
        {
            $error="コメントを120文字以内で入力してください";

            return redirect('/owner/edit'.'/'.$shopId)->with(compact('error'));
        }
        else
        {
            Shop::where('id','=',$shopId)->update([
            'comment' => $postComment,
            ]);

            $message="コメントが変更されました。";

            return redirect('/owner')->with(compact('message'));
        }
        
    }
    public function getAdd()
    {
        $UserId = Auth::id();
        $ownerData = User::find($UserId);

        $categories = Category::all();
        $places = Place::all();
        
        return view('owner/add', compact('ownerData','categories','places'));
    }

    public function getImport()
    {
        $UserId = Auth::id();
        $ownerData = User::find($UserId);

        return view('owner/inport', compact('ownerData'));
    }

    public function postImport(Request $request)
    {

        $file = $request->file('shop');

        $import = new ShopsImport();
        Excel::import($import, $file);
        
        $message = "登録が完了しました。「編集する」から画像の登録を行ってください。";

        return redirect('/owner')->with(compact('message'));
    }
}