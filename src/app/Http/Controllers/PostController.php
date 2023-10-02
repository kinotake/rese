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

    public function getReassessment($shop_id)
    {
        $shopId = $shop_id;
        $who= Auth::id();
        $shopData = Shop::where('id',$shopId)->first();
        $postData = Post::where('shop_id',$shopId)->where('user_id',$who)->first();

        return view('reassessment', compact('shopData','postData'));
    }
    public function postReassessment(PostRequest $request)
    {   
        $selectedScore = $_POST["score"];
        $reassessmentComment = $_POST["comment"];
        $selectedPostId = $_POST["post_id"];

        if($request->file('image') != null)
        {
            $dir = 'images';
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir,'post/'. $file_name);

            $imageData = Image::where('post_id',$selectedPostId)->first();

            $image = Image::find($imageData->id);
            $image->path = 'storage/' . $dir . '/' .'post/'. $file_name;
            $image->save();
        }
        
        
        $post = Post::find($selectedPostId);
        $post->score=$selectedScore;
        $post->comment=$reassessmentComment;
        $post->save();

        $message="評価が変更されました。";

        return redirect('/went')->with(compact('message'));
    }

    public function deletePost($post_id)
    {   
        $reserve = Post::find($post_id)->delete();

        $message="投稿が削除されました。";

        return back()->with(compact('message'));
    }
}
