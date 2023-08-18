<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class UserController extends Controller
{
    public function postUserSend(Request $request)
    {   
        $content = $request->input('content');
        $title = $request->input('title');
        $userId = $request->input('user_id');
        $userData = User::find($userId);
        $email = $userData->email;
        
        Mail::send(new SendMail($content,$title,$email));

        $message="メールが送信されました。";

        return redirect('/owner')->with(compact('message'));

    }
}
