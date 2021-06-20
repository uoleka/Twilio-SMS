<?php

namespace App\Http\Livewire;
use App\Models\Sms;
use Livewire\Component;

class SmsShow extends Component
{
    public function render()
    {
        $sms_details = Sms::all(); //query db with model
        return view('livewire.sms-show',compact("sms_details"));
    }
}
