<?php

return [
  'debug' => true,
  'optionApiUrl' => 'https://kirby.soapatrick.com/api/',
  'panel' => [
    'slug' => 'yygang'
  ],
  'routes' => [
    [
      'pattern' => 'box/(:num)/(:num)/(:any)',
      'action'  => function ($year, $month, $slug) {
        // find the page with $slug in blog folder and return if can be found
        return page('box/'.$slug);
      }
    ],
    [
      'pattern' => 'box/(:any)',
      'action'  => function ($uid) {
        $page = page('box')->children()->find($uid);

        if ( $page ) {
            // get the year from the page and redirect to new folder path
          return go('box/'.$page->published()->toDate('Y').'/'.$page->published()->toDate('m').'/'.$page->slug());
        } else {
           // If there is no page set, then go to next. This will make previews work again.
          $this->next();
        }
      }
    ]
  ]
];