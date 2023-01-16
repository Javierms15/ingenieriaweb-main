<?php
/*
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', 'AcaquqcFtJ6fwD5yrQT-riVePkod_KKrygHfJBm1A4iRUV5u8_wgGrdp6aQE2DOrvPxFvZT_0SxQ2tMt'),
        'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'EF_ucOJySuYh2lGys1i2qUS1al6eqcEIg1ZmWMdoDYTK0ZUn78FwWJP9n30LI70mcS0DrhaZDmFjvMkN'),
        'app_id'            => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
        'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
];


/* set your paypal credential 
return array(
    'client_id' =>'AcaquqcFtJ6fwD5yrQT-riVePkod_KKrygHfJBm1A4iRUV5u8_wgGrdp6aQE2DOrvPxFvZT_0SxQ2tMt',
    'secret' => 'EF_ucOJySuYh2lGys1i2qUS1al6eqcEIg1ZmWMdoDYTK0ZUn78FwWJP9n30LI70mcS0DrhaZDmFjvMkN',
    /**
    * SDK configuration 
    
    'settings' => array(
        /**
        * Available option 'sandbox' or 'live'
        
        'mode' => 'sandbox',
        /**
        * Specify the max request time in seconds
        
        'http.ConnectionTimeOut' => 1000,
        /*
        * Whether want to log to a file
        
        'log.LogEnabled' => true,
        /**
        * Specify the file that want to write on
        
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
        * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
        *
        * Logging is most verbose in the 'FINE' level and decreases as you
        * proceed towards ERROR
        
        'log.LogLevel' => 'FINE'
        ),
);


return array(
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID'),
        'client_secret'    =>env('PAYPAL_SANDBOX_CLIENT_SECRET',),
    ],

);*/

return [ 
    'client_id' => env('PAYPAL_CLIENT_ID',''),
    'secret' => env('PAYPAL_SECRET',''),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];
