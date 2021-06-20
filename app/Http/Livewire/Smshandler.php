<?php

namespace App\Http\Livewire;
use App\Models\Sms;
use Livewire\Component;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class Smshandler extends Component
{
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

    public function storeMessage(Request $request)
    {
        //run validation on data sent in
        $validatedData = $request->validate([
            'phone_number' => 'required|numeric',
            'details'      => 'required|max:140'
        ]);
        $sms_model = new Sms($request->all());
        $sms_model->save();
        $this->sendMessage($request->details, $request->phone_number);
        return back()->with(['success' => "Message Sent"]);
    }

    public function render()
    {
        return view('livewire.sms_handler');
    }
}
