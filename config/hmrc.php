<?php

return [
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
