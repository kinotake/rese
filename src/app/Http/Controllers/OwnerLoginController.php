<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;
use App\Models\Reserve;

class OwnerLoginController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $today = \Carbon\Carbon::today();

        $reserveDatas = Reserve::whereDate('date','=',$today)->get();

        foreach ($reserveDatas as $reserveData) {
            
            Mail::send(new ReminderEmail($reserveData));

        }
    

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::guard('owners')->logout();
        $request->session()->regenerateToken();

         $message = "ログアウトしました。";

        return redirect('owner/login')->with(compact('message'));
    }
}
