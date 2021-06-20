<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Sms;
use Twilio\Rest\Client;
use Log;

class SendTwilioMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param  App\Models\Sms  $sms
     * @return void
     */
    protected $sms;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Sms $sms)
    {
        $this->onQueue('sms');
        $this->sms = $sms;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);

        try {
            $client->messages->create($this->sms->phone_number, ['from' => $twilio_number, 'body' => $this->sms->details] );
            $this->sms->status = 'Sent';
        } catch (\Exception $e) {
            \Log::error(sprintf('Twilio Send Message Error: ', $e->getMessage()));
            $this->sms->status = 'Failed';
        }

        $this->sms->save();
    }
}
