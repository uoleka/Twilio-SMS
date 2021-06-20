<?php

namespace App\Http\Livewire;
use App\Models\Sms;
use Livewire\Component;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class Smshandler extends Component
{
    
    public $phone_number;
    public $details;
    protected $rules = [
        'phone_number' => 'required|numeric|min:6',
        'details' => 'required|max:140',
    ];
    public function storeMessage(Request $request)
    {
        //run validation on data sent in
        $this->validate();
        Sms::create([
            'phone_number' => $this->phone_number,
            'details' => $this->details,
            'status' => 'Queued',
        ]);
        
        $this->sendMessage($request->details, $request->phone_number);
        return back()->with(['success' => "Message Sent"]);
    }

     /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     */
    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }

    public function render()
    {
        return view('livewire.sms_handler');
    }
}
