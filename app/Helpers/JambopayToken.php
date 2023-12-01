<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class JambopayToken
{
    public static function accessToken()
    {
        $url = config('services.jambopay.url');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/x-www-form-urlencoded',
            )
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS,
            'username='.config('services.jambopay.username').'&Grant_type=password&Password='.config('services.jambopay.password').'',
        );

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        curl_close($curl);
        return $access_token->access_token;
    }

    public static function walletAccessToken()
    {
        $url = config('services.jambopay.wallet_auth_url').'/auth/token';
        $response = Http::asForm()->post($url, [
            'client_id' => config('services.jambopay.wallet_client_id'),
            'client_secret' => config('services.jambopay.wallet_client_secret'),
            'grant_type' => 'client_credentials'
        ]);

        return json_decode($response);
    }
}
