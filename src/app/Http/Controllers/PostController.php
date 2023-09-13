<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Shop;
use App\Models\Reserve;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function postAssessment(PostRequest $request)
    {   
        
        $fulled_score = $_POST["score"];
        $fulled_comment = $_POST["comment"];
        $reserve_id = $_POST["reserve_id"];
        
        $post = new Post();
        $post->score=$fulled_score;
        $post->comment=$fulled_comment;
        $post->reserve_id=$reserve_id;
        $post->save();

        $message = "評価いただきありがとうございます。";

        return redirect('/went')->with(compact('message'));    
    }

    public function getReassessment($reserve_id)
    {
        $reserveId = $reserve_id;
        $ReserveDatas = Reserve::where('id',$reserveId)->first();
        $shopId = $ReserveDatas->shop_id;
        $shopData = Shop::where('id',$shopId)->first();
        $postData = Post::where('reserve_id',$reserveId)->first();

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
        $post->reserve_id=$reserveId;
        $post->save();

        $message="評価が変更されました。";

        return redirect('/went')->with(compact('message'));
    }
}
