<?php

return [
   
    'host' => getenv('DB_HOST') ?: 'mysql',
    'database' => getenv('DB_NAME') ?: 'blog_db',
    'username' => getenv('DB_USER') ?: 'blog_user',
    'password' => getenv('DB_PASS') ?: 'blog_pass',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
];
