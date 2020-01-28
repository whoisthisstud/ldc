<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    |
    | Specify the base uri for each service.
    |
    |
    |
    */

    'services' => [
        'facebook' => [
            'uri' => 'https://www.facebook.com/sharer/sharer.php?u=',
        ],
        'twitter' => [
            'uri' => 'https://twitter.com/intent/tweet',
            'text' => env('APP_NAME','Local Discount Club'),
        ],
        'linkedin' => [
            'uri' => 'http://www.linkedin.com/shareArticle',
            'extra' => ['mini' => 'true'],
        ],
        'whatsapp' => [
            'uri' => 'https://wa.me/?text=',
            'extra' => ['mini' => 'true'],
        ],
        'pinterest' => [
            'uri' => 'http://pinterest.com/pin/create/button/?url=',
        ],
        'reddit' => [
            'uri' => 'https://www.reddit.com/submit',
            'text' => env('APP_NAME','Local Discount Club'),
        ],
        'telegram' => [
            'uri' => 'https://telegram.me/share/url',
            'text' => env('APP_NAME','Local Discount Club'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Font Awesome
    |--------------------------------------------------------------------------
    |
    | Specify the version of Font Awesome that you want to use.
    | We support version 4 and 5.
    |
    |
    */

    'fontAwesomeVersion' => 4,
];
