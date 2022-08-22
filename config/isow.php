<?php

//own config env

return [
    'version' => env('APP_VERSION', 'v.1.0.0'),
    'tinymce' => env('TINYMCE', ''),
    'bitly' => env('BITLY_ACCESS_TOKEN', ''),
    'geolocation' => env('GEOLOCATION_IPXAPI_API_KEY', ''),
    'google' => [
        'maps' => env('GOOGLE_MAPS_API_KEY', ''),
        'analitycs' => env('GOOGLE_ANALYTICS_KEY', ''),
    ],
    'onesignal' => [
        'web' => env('ONESIGNAL_APP_ID', ''),
        'safari' => env('ONESIGNAL_SAFARI_WEB_ID', ''),
    ],
];
