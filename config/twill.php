<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Admin URL
    |--------------------------------------------------------------------------
    |
    | This value is the URL of your admin application.
    |
     */
    'admin_app_url' => env('ADMIN_APP_URL', env('APP_URL')),
    'admin_app_path' => env('ADMIN_APP_PATH', 'administration'),

    /*
    |--------------------------------------------------------------------------
    | Twill default tables naming configuration
    |--------------------------------------------------------------------------
    |
     */
    'users_table' => 'admin_users',
    'password_resets_table' => 'admin_password_resets',
    'users_oauth_table' => 'admin_users_oauth',
    'blocks_table' => 'content_blocks',
    'features_table' => 'content_features',
    'settings_table' => 'settings',
    'medias_table' => 'content_medias',
    'mediables_table' => 'content_mediables',
    'files_table' => 'content_files',
    'fileables_table' => 'content_fileables',
    'related_table' => 'content_related',
    'tags_table' => 'content_tags',
    'tagged_table' => 'content_tagged',

];
