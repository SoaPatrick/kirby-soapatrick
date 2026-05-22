<?php

$feed = require 'localfeed.php';

return [
    'debug' => true,
    'auth'  => require_once 'localauth.php',
    'email' => require_once 'localemail.php',
    'fk_feed.token'           => $feed['token'],
    'fk_feed.apiUrl.movies'   => $feed['apiUrl']['movies'],
    'fk_feed.apiUrl.episodes' => $feed['apiUrl']['episodes'],
    'cache' => [
        'fk_feed' => ['type' => 'file']
    ],
];
