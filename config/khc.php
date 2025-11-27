<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Size
    |--------------------------------------------------------------------------
    |
    | This value determines the number of items to be displayed per page
    | when paginating results in the application. You can adjust this
    | value according to your application's requirements.
    |
    */

    'pagination' => 20,

    'max_upload_size' => 5000, // in Kilobytes (10 MB)

    'date' => [
        'date_format' => 'd-m-Y',
    
        'time_format' => 'h:i A',

        'display_format' => 'd-m-Y',
    ],
    'captcha' => env('CAPTCHA',true),

    /*
    |--------------------------------------------------------------------------
    | Location Configuration
    |--------------------------------------------------------------------------
    |
    | This section contains the geographical coordinates and Google Maps
    | embed URL for the Gauhati High Court Kohima Bench.
    |
    */
    'location' => [
        'latitude' => 25.6751,
        'longitude' => 94.1086,
        'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3624.0!2d94.1086!3d25.6751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDQwJzMwLjQiTiA5NMKwMDYnMzEuMCJF!5e0!3m2!1sen!2sin!4v1234567890',
    ],

    '2fa' => env('2FA', true),
];