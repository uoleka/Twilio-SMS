<?php

namespace App\Http\Livewire;
use App\Models\Sms;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Jobs\SendTwilioMessage;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;

class Smshandler extends Component
{
    use WithRateLimiting;
    
    public $phone_number;
    public $details;
    protected $rules = [
        'phone_number' => 'required|numeric|min:6',
        'details' => 'required|max:140',
    ];

    public function storeMessage(Request $request)
    {
        try {
            // limit 1 request every 15 seconds
            $this->rateLimit(1, 15);
        } catch (\DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException $e) {
            throw new \Illuminate\Http\Exceptions\ThrottleRequestsException($e->getMessage());
        }
        //run validation on data sent in
        $this->validate();
        $sms = Sms::create([
            'phone_number' => $this->phone_number,
            'details' => $this->details,
            'status' => 'Queued',
        ]);

        SendTwilioMessage::dispatch($sms);
        
        return back()->with(['success' => "Message Sent"]);
    }

    public function render()
    {
        return view('livewire.sms_handler');
    }
}
