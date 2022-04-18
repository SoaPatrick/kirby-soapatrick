<?php

return [
  'optionApiUrl' => 'https://www.soapatrick.com/api/',
  'panel' => require_once 'panel.php',
  'thumbs' => require_once 'thumbs.php',
  'routes' => [
    [
      'pattern' => 'sitemap.xml',
      'action'  => function() {
          $pages = site()->pages()->index();

          // fetch the pages to ignore from the config settings,
          // if nothing is set, we ignore the error page
          $ignore = kirby()->option('sitemap.ignore');
          $log = page('log')->children()->pluck('id', ',');
          $lab = page('lab')->children()->pluck('id', ',');

          $unlisted_factory_items = page('factory')->children()->unlisted()->pluck('id', ',');
          $movies = page('movies')->children()->pluck('id', ',');
          $ignore = array_merge($ignore, $log, $lab, $unlisted_factory_items, $movies);

          $content = snippet('sitemap', compact('pages', 'ignore'), true);

          return new Kirby\Cms\Response($content, 'application/xml');
      }
    ],
    [
      'pattern' => 'sitemap',
      'action'  => function() {
        return go('sitemap.xml', 301);
      }
    ],
  ],
  'sitemap.ignore' => ['log', 'factory', 'box', 'movies', 'error', 'feed', 'search', 'storage', 'privacy'],
  'panel.install' => true
];