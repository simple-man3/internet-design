<?php

return [
    'testApi' => [
        'host' => env('TEST_TICKET_PROVIDER_HOST'),
        'token' => 'Bearer ' . env('TEST_TICKET_PROVIDER_TOKEN'),
    ]
];
