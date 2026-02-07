<?php

return [
    '401' => [
        'title' => 'Unauthorized',
        'description' => 'You do not have permission to access this resource.',
    ],
    '403' => [
        'title' => 'Forbidden',
        'description' => 'You are not allowed to perform this action.',
    ],
    '404' => [
        'title' => 'Page Not Found',
        'description' => 'We could not find the page you were looking for.',
    ],
    '419' => [
        'title' => 'Page Expired',
        'description' => 'The page has expired due to inactivity. Please refresh and try again.',
    ],
    '429' => [
        'title' => 'Too Many Requests',
        'description' => 'You have made too many requests. Please wait a moment.',
    ],
    '500' => [
        'title' => 'Server Error',
        'description' => 'Something went wrong on our servers.',
    ],
    '503' => [
        'title' => 'Service Unavailable',
        'description' => 'We are currently performing maintenance. Please check back soon.',
    ],
    'default' => [
        'title' => 'An Error Occurred',
        'description' => 'An unexpected error occurred.',
    ],
];