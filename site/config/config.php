<?php

return [
  'optionApiUrl' => 'https://kirby.soapatrick.com/api/',
  'panel' => require_once 'panel.php',
  'thumbs' => require_once 'thumbs.php',
  'routes' => require_once 'routes.php',
  'sitemap.ignore' => ['log', 'factory', 'box', 'movies', 'error', 'feed', 'search', 'storage']
];