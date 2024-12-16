<?php

declare(strict_types=1);

return [
    'news_api' => [
        'api_key' => env('NEWS_API_KEY', ''),
        'base_url' => env('NEWS_API_ENDPOINT', ''),
    ],
    'guardian' => [
        'api_key' => env('GUARDIAN_API_KEY', ''),
        'base_url' => env('GUARDIAN_API_ENDPOINT', ''),
    ],
    'bbc' => [
        'api_key' => env('BBC_API_KEY', ''),
        'base_url' => env('BBC_API_ENDPOINT', ''),
    ],
];
