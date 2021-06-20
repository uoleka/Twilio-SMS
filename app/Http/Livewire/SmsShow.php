<?php

namespace App\Http\Livewire;
use App\Models\Sms;
use Livewire\Component;

class SmsShow extends Component
{
    public function render()
    {
        $messages = Sms::all(); //query db with model
        return view('livewire.sms-show',compact("messages"));
    }
}
