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

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'stripe' => [
        'key' => env('STRIPE_KEY', config('services.stripe.key')),
        'secret' => env('STRIPE_SECRET', config('services.stripe.secret')),
        'webhook' => env('STRIPE_WEBHOOK_SECRET', config('services.stripe.webhook.secret')),
        'currency' => env('CASHIER_CURRENCY', config('services.stripe.currency')),
    ],

    'kkipay' => [
        'key' => env('KKIPAY_KEY', config('services.kkipay.key')),
        'private_key' => env('KKIPAY_PRIVATE_KEY', config('services.kkipay.private_key')),
        'secret' => env('KKIPAY_SECRET', config('services.kkipay.secret')),
    ],

    'square' => [
        'application_id' => env('SQUARE_APPLICATION_ID', config('services.square.application_id')),
        'access_token' => env('SQUARE_ACCESS_TOKEN', config('services.square.access_token')),
    ],

    'razorpay' => [
        'key_id' => env('RAZORPAY_KEY_ID', config('services.razorpay.key_id')),
        'key_secret' => env('RAZORPAY_KEY_SECRET', config('services.razorpay.key_secret')),
    ],

    'authorize_net' => [
        'login_id' => env('AUTHORIZE_NET_LOGIN_ID', config('services.authorize_net.login_id')),
        'transaction_key' => env('AUTHORIZE_NET_TRANSACTION_KEY', config('services.authorize_net.transaction_key')),
    ],

    'mobile_money' => [
        'provider' => env('MOBILE_MONEY_PROVIDER', config('services.mobile_money.provider')),
        'key' => env('MOBILE_MONEY_KEY', config('services.mobile_money.key')),
    ],

    'flutterwave' => [
        'key' => env('FLUTTERWAVE_KEY', config('services.flutterwave.key')),
        'secret' => env('FLUTTERWAVE_SECRET', config('services.flutterwave.secret')),
    ],

    'paystack' => [
        'key' => env('PAYSTACK_KEY', config('services.paystack.key')),
        'secret' => env('PAYSTACK_SECRET', config('services.paystack.secret')),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URL'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_CLIENT_CALLBACK')
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_CLIENT_CALLBACK')
    ]
];
