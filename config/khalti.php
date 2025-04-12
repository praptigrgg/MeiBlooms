<?php


return [
    'test_secret_key' => env('KHALTI_TEST_SECRET_KEY'),
    'initiation_url' => 'https://a.khalti.com/api/v2/epayment/initiate/',
    'verification_url' => 'https://a.khalti.com/api/v2/epayment/lookup/',
    'website_url' => env('APP_URL'),
];
