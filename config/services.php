<?php

return [

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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

//    'facebook' => [
//        'client_id'     => '158581608186371',
//        'client_secret' => 'd83fe9d603540c737a88bf6c3c5488e7',
//        'redirect'      => 'https://m-dev.ws4it.net/hogozati/auth/facebook/callback',
//    ],

    'facebook' => [
        'client_id'     => '450953378978520',
        'client_secret' => '1a0d6c67564aab16a2085af3b8647b0f',
        'redirect'      => 'https://saaloon.com/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id'     => 'WoZkG9FEjPs1XKIT3AIJynuw8',
        'client_secret' => 'sptSj3pqFHkg0GqL9issXScaEVaShiA8ndYizBcyn6aagoFv6k',
        'redirect'      => 'https://saaloon.com/auth/twitter/callback',
    ],

//    'google' => [
//        'client_id'     => '348297306681-c8n8mh2j8jvok1d37f93js51hj1i9er1.apps.googleusercontent.com',
//        'client_secret' => 'Lw9R6m2ZdlYpUliNdchj_oi_',
//        'redirect'      => 'https://m-dev.ws4it.net/hogozati/auth/google/callback',
//    ],

    'google' => [
        'client_id'     => '705836237954-9l7mv1bv42mldhml98othls93f5r5qio.apps.googleusercontent.com',
        'client_secret' => 'qIthIt6xuqYAtEI8buDdQ4G2',
        'redirect'      => 'http://saaloon.com/auth/google/callback',
    ],


//    'yahoo' => [
//        'client_id'     => 'dj0yJmk9UVhqeVQ2Z1hXVVJTJmQ9WVdrOVRWZEtZMk51TldNbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD0yMw--',
//        'client_secret' => '4d67c0cddac34cade3e4eb90faff493863ac9b22',
//        'redirect'      => 'https://m-dev.ws4it.net/hogozati/auth/yahoo/callback',
//    ],

    'yahoo' => [
        'client_id'     => 'dj0yJmk9V0hPWjBtU0g1cE83JmQ9WVdrOVduTkVUMFk1TjJjbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD0xZA--',
        'client_secret' => '9fbfd0a4281a1ae5038f4a5abea90754a04ba462',
        'redirect'      => 'http://www.saaloon.com/auth/yahoo/callback',
    ],

];
