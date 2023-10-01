<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function postAssessment(PostRequest $request)
    {   
        $fulled_score = $_POST["score"];
        $fulled_comment = $_POST["comment"];
        $reserve_id = $_POST["reserve_id"];

        $who = Auth::id();
        $ReserveData = Reserve::find($reserve_id);
        
        $post = new Post();
        $post->score=$fulled_score;
        $post->comment=$fulled_comment;
        $post->shop_id=$ReserveData->shop_id;
        $post->user_id=$who;
        $post->save();

        $dir = 'images';

        if($request->file('image') == null)
        {
            $message = "評価いただきありがとうございます。";

            return redirect('/went')->with(compact('message')); 
        }
        else{

            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir,'post/'. $file_name);

            $madePostData = Post::where('shop_id',$ReserveData->shop_id)->where('user_id',$who)->first();
            $photo = new Image();
            $photo->post_id = $madePostData->id;
            $photo->path = 'storage/' . $dir . '/' .'post/'. $file_name;
            $photo->save();

            $message = "評価、及び画像のアップロードありがとうございます。";

            return redirect('/went')->with(compact('message')); 
        }   
    }

    public function getReassessment($reserve_id)
    {
        $reserveId = $reserve_id;
        $who= Auth::id();
        $ReserveDatas = Reserve::where('id',$reserveId)->first();
        $shopId = $ReserveDatas->shop_id;
        $shopData = Shop::where('id',$shopId)->first();
        $postData = Post::where('shop_id',$shopId)->where('user_id',$who)->first();

        return view('reassessment', compact('shopData','reserveId','postData'));
    }
    public function postReassessment(PostRequest $request)
    {   
        $selectedScore = $_POST["score"];
        $reassessmentComment = $_POST["comment"];
        $selectedPostId = $_POST["post_id"];
        $reserveId = $_POST["reserve_id"];
        
        $post = Post::find($selectedPostId);
        $post->score=$selectedScore;
        $post->comment=$reassessmentComment;
        $post->save();

        $message="評価が変更されました。";

        return redirect('/went')->with(compact('message'));
    }
}
