<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'midtrans' => [
        // The server key for authenticating API requests from your server
        'serverKey' => env('MIDTRANS_SERVER_KEY'),
    
        // The client key for client-side authentication
        'clientKey' => env('MIDTRANS_CLIENT_KEY'),
    
        // Boolean flag to determine if the environment is production
        // If set to true, use the production endpoint; otherwise, use the sandbox/testing environment
        'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    
        // Boolean flag to enable or disable request sanitization
        'isSanitized' => env('MIDTRANS_IS_SANITIZED', true),
    
        // Boolean flag to enable or disable 3-D Secure (3DS) for added security in online transactions
        'is3ds' => env('MIDTRANS_IS_3DS', true),
    ],

];
