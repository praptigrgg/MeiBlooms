<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class KhaltiClient
{
    public function initiatePayment($data)
    {
        $secret = config('khalti.test_secret_key');

        if (!$secret) {
            throw new \Exception("Khalti secret key not set in config!");
        }

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . $secret,
            'Content-Type' => 'application/json',
        ])->post(config('khalti.initiation_url'), $data);

        if ($response->failed()) {
            dd('Khalti Error:', $response->status(), $response->body()); 
        }

        return $response->body();
    }


    public function verifyPayment($pidx)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . config('khalti.test_secret_key'),
        ])->get(config('khalti.verification_url'), [
            'pidx' => $pidx,
        ]);

        return $response->json();
    }
}
