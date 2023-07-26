<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function postAssessment()
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
}
