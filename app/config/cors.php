<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'], // HTTP methods that are allowed for CORS requests. Use ['*'] to allow all methods.
    
    'allowed_origins' => ['*'], // Origins that are allowed to access your application. Use ['*'] to allow all origins.
    
    'allowed_origins_patterns' => [], // Regular expressions patterns that define allowed origins.
    
    'allowed_headers' => ['*'], // Headers that are allowed in CORS requests. Use ['*'] to allow all headers.
    
    'exposed_headers' => [], // Headers that are exposed to the client.
    
    'max_age' => 0, // Maximum time (in seconds) that a preflight response can be cached by the client.
    
    'supports_credentials' => false,

    // 'allowed_methods' => ['*'],

    // 'allowed_origins' => ['*'],

    // 'allowed_origins_patterns' => [],

    // 'allowed_headers' => ['*'],

    // 'exposed_headers' => [],

    // 'max_age' => 0,

    // 'supports_credentials' => false,

];
