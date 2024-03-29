<?php

$services = [
    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect'      => env('GOOGLE_REDIRECT_URL'),
    ],

    'twitter' => [
        'client_id'     => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect'      => env('TWITTER_REDIRECT_URL'),
    ],
];

if (env('APP_ENV') == 'local') {
    $services['github'] = [
        'client_id'     => env('GITHUB_LOCAL_CLIENT_ID'),
        'client_secret' => env('GITHUB_LOCAL_CLIENT_SECRET'),
        'redirect'      => env('GITHUB_LOCAL_REDIRECT_URL'),
    ];
}else{
    $services['github'] = [
        'client_id'     => env('GITHUB_PRODUCTION_CLIENT_ID'),
        'client_secret' => env('GITHUB_PRODUCTION_CLIENT_SECRET'),
        'redirect'      => env('GITHUB_PRODUCTION_REDIRECT_URL'),
    ];
}

return $services;
