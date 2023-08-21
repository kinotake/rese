<?php

namespace App\Http\Livewire\Attendance;

use Livewire\Component;

class Attendancesqrcd extends Component
{
    public function render()
    {
        return view('livewire.attendance.attendancesqrcd')->layout('layouts.qrcode');
    }

    public function attend(User $user)
    {
        DB::table('attendances')->insert([
            'user_id' => $user->id,
            'check_in_at' => Carbon::now(),
        ]);
        session()->flash('message',  $user->name ."様の出席登録が完了!");

    }
}
