<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Account to impersonate
    |--------------------------------------------------------------------------
    | The email of the account to impersonate, account should have neccessary
    | permissions for the scopes requested
    |
    | @link https://developers.google.com/admin-sdk/directory/v1/guides/delegation
    |
    */
    'subject' => env('GOOGLE_SERVICE_ACCOUNT'),

    /*
    |--------------------------------------------------------------------------
    | Path to Credentials
    |--------------------------------------------------------------------------
    | This should be the full path to the credentials file supplied
    | by google when creating a service account. Ensure you add
    | your credentials file to your .gitignore file
    |
    */
    'credentials_path' => storage_path('credentials.json'),

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    | The scopes requested
    |
    | @link https://developers.google.com/admin-sdk/directory/v1/guides/authorizing
    |
    */
    'scopes' => [
        'https://www.googleapis.com/auth/admin.directory.user',
        'https://www.googleapis.com/auth/admin.directory.group'
    ],

    /*
    |--------------------------------------------------------------------------
    | Domain
    |--------------------------------------------------------------------------
    | Your GSuite domain
    |
    */
    'domain' => env('GSUITE_DOMAIN', 'example.com'),
    
    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    | Caching options
    |
    */
    'cache' => [
        
        'accounts' => [
            'cache' => true,

            'key' => 'gsuite:accounts',
            
            'time' => 600, // seconds
        ],

        'groups' => [
            'cache' => true,
            
            'key' => 'gsuite:groups',

            'time' => 600, //seconds
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Undeletable
    |--------------------------------------------------------------------------
    | Accounts and Groups that you don't want anyone to be able to delete
    |
    */
    'undeletable' => [
        
        'accounts' => [],

        'groups' => []
        
    ]
    
];
