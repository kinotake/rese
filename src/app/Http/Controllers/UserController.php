<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\ManyMail;

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

    public function postAllUserSend(Request $request)
    {   
        $content = $request->input('content');
        $title = $request->input('title');
        
        $userDatas = User::where('role_id','=','1')->get();

        $userEmailDatas = array();
        foreach($userDatas as $userData)
        {
            $userEmailDatas[] = $userData->email;
        }
        
        $unique_emails=$userEmailDatas;

        Mail::to($unique_emails)->send(new ManyMail($content,$title,$unique_emails));

        $message="ユーザ全員にメールが送信されました。";

        return redirect('/administrator/user/send')->with(compact('message'));

    }
}
