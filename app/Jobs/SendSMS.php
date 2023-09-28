<?php

namespace App\Jobs;

use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $phone_number;
    public $message;

    /**
     * Create a new job instance.
     */
    public function __construct($phone_number, $message)
    {
        $this->phone_number = $phone_number;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // $AT = new AfricasTalking(config('services.africastalking.username'), config('services.africastalking.key'));
        // $sms = $AT->sms();

        // $result = $sms->send([
        //     'to' => $this->phone_number,
        //     'message' => $this->message,
        // ]);

        // info($result);

        $token = Http::asForm()
                        ->post('https://accounts.jambopay.com/auth/token', [
                            'grant_type' => 'client_credentials',
                            'client_id' => config('services.jambopay.sms_client_id'),
                            'client_secret' => config('services.jambopay.sms_client_secret'),
                        ]);

        $response = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . json_decode($token)->access_token,
                    ])
                    ->post('https://swift.jambopay.co.ke/api/public/send', [
                        'sender_name' => 'PASANDA',
                        'contact' => $this->phone_number,
                        'message' => $this->message,
                        'callback' => 'https://pasanda.com/sms/callback'
                    ]);
    }
}
