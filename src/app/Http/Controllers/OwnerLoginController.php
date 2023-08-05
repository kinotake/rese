<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OwnerLoginController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('owner')->attempt($credentials)) {
            
            $message = "ログインしました。";

            return redirect('/owner')->with(compact('message'));

        }

        $message = "ログインに失敗しました。";

        return redirect('/owner/login')->with(compact('message'));
    }
}
