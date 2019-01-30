<?php

return [
    /**
     * Environment to use, set to true if you want to talk to HMRC Live and set to false to talk to HMRC sandbox
     */

    'live_env' => true,

    /**
     * Required: credentials setting
     */
    'client_id' => env('HMRC_CLIENT_ID'),
    'client_secret' => env('HMRC_CLIENT_SECRET'),

    /**
     * Optionals
     */
    'server_token' => env('HMRC_SERVER_TOKEN'),

    /**
     * Callback URI setting
     */
    'callback_uri' => env('HMRC_CALLBACK_URI'),
];
