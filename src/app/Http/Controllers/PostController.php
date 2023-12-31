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
        $shop_id = $_POST["shop_id"];
        $post_header = $_POST["post_header"];

        $dir = 'images';

        if($request->file('image') == null){

            $who = Auth::id();
        
            $post = new Post();
            $post->score=$fulled_score;
            $post->comment=$fulled_comment;
            $post->post_header=$post_header;
            $post->shop_id=$shop_id;
            $post->user_id=$who;
            $post->save();

            $calculatePosts = Post::where('shop_id','=',$shop_id)->get();
            $sum = 0;

            foreach ($calculatePosts as $calculatePost) 
            {
                $sum += $calculatePost->score;
            }

            $postNum = Post::where('shop_id','=',$shop_id)->count();
            $newAverage = $sum/$postNum;
            $arrangedNum = round($newAverage,1); 

            $shop = Shop::find($shop_id);
            $shop->average=$arrangedNum;
            $shop->save();

            $message = "評価いただきありがとうございます。";

            return redirect('/went')->with(compact('message')); 
        }
        else{
            $extension = $request->file('image')->extension();
        }   

        if($extension == 'jpg'||$extension == 'jpeg'||$extension == 'png')
        {
            $who = Auth::id();
        
            $post = new Post();
            $post->score=$fulled_score;
            $post->comment=$fulled_comment;
            $post->post_header=$post_header;
            $post->shop_id=$shop_id;
            $post->user_id=$who;
            $post->save();

            $calculatePosts = Post::where('shop_id','=',$shop_id)->get();
            $sum = 0;

            foreach ($calculatePosts as $calculatePost) 
            {
                $sum += $calculatePost->score;
            }

            $postNum = Post::where('shop_id','=',$shop_id)->count();
            $newAverage = $sum/$postNum;
            $arrangedNum = round($newAverage,1); 

            $shop = Shop::find($shop_id);
            $shop->average=$arrangedNum;
            $shop->save();

            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir,'post/'. $file_name);

            $madePostData = Post::where('shop_id',$shop_id)->where('user_id',$who)->first();
            $photo = new Image();
            $photo->post_id = $madePostData->id;
            $photo->path = 'storage/' . $dir . '/' .'post/'. $file_name;
            $photo->save();

            $message = "評価、及び画像のアップロードありがとうございます。";

            return redirect('/went')->with(compact('message')); 

        }else{

            $error_message="画像の形式はjpgかpngを選択してください。";

            return back()->with(compact('error_message'));

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
        $shop_id = $_POST["shop_id"];
        $selectedPostId = $_POST["post_id"];
        $post_header = $_POST["post_header"];

        $imageData = Image::where('post_id',$selectedPostId)->first();


        if($request->file('image') != null)
        {

            $extension = $request->file('image')->extension();

            if($extension == 'jpg'||$extension == 'jpeg'||$extension == 'png' && $imageData != null){

                $dir = 'images';
                $file_name = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/' . $dir,'post/'. $file_name);

                $image = Image::find($imageData->id);
                $image->path = 'storage/' . $dir . '/' .'post/'. $file_name;
                $image->save();
            }
            elseif($extension == 'jpg'||$extension == 'jpeg'||$extension == 'png' && $imageData == null)
            {
                $dir = 'images';
                $file_name = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/' . $dir,'post/'. $file_name);

                $photo = new Image();
                $photo->post_id = $selectedPostId;
                $photo->path = 'storage/' . $dir . '/' .'post/'. $file_name;
                $photo->save();
            }
            else{
                $error_message="画像の形式はjpgかpngを選択してください。";

                return back()->with(compact('error_message'));
            }
        }
        
        $post = Post::find($selectedPostId);
        $post->score=$selectedScore;
        $post->comment=$reassessmentComment;
        $post->post_header=$post_header;
        $post->save();

        $calculatePosts = Post::where('shop_id','=',$shop_id)->get();
        $sum = 0;

        foreach ($calculatePosts as $calculatePost) 
        {
            $sum += $calculatePost->score;
        }

        $postNum = Post::where('shop_id','=',$shop_id)->count();
        $newAverage = $sum/$postNum;
        $arrangedNum = round($newAverage,1); 

        $shop = Shop::find($shop_id);
        $shop->average=$arrangedNum;
        $shop->save();

        $message="評価が変更されました。";

        return redirect('/went')->with(compact('message'));
    }

    public function deletePost($post_id)
    {   
        $deleteData = Post::find($post_id);
        $reserve = Post::find($post_id)->delete();

        $shop_id = $deleteData->shop_id;

        $calculatePosts = Post::where('shop_id','=',$shop_id)->get();
        $sum = 0;

        foreach ($calculatePosts as $calculatePost) 
        {
            $sum += $calculatePost->score;
        }

        $postNum = Post::where('shop_id','=',$shop_id)->count();
        $newAverage = $sum/$postNum;
        $arrangedNum = round($newAverage,1); 

        $shop = Shop::find($shop_id);
        $shop->average=$arrangedNum;
        $shop->save();

        $message="投稿が削除されました。";

        return back()->with(compact('message'));
    }
}
