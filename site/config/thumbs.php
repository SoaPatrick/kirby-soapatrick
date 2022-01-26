<?php

return [
  'presets' => [
    'lightbox-jpg' => ['width' => 2560, 'quality' => 100,'format' => 'webp'],
    'lightbox-png' => ['width' => 2560, 'quality' => 100,'format' => 'webp']
  ],
  'srcsets' => [
    'cover-home' => [
      '1x' => ['width' => 200,'height' => 200,'quality' => 80,'format' => 'webp','crop' => 'center'],
      '2x' => ['width' => 400,'height' => 400,'quality' => 80,'format' => 'webp','crop' => 'center']
    ],
    'cover-list-jpg' => [
      '1x' => ['width' => 120, 'quality' => 80,'format' => 'webp'],
      '2x' => ['width' => 240, 'quality' => 80,'format' => 'webp']
    ],
    'cover-list-png' => [
      '1x' => ['width' => 120, 'quality' => 100,'format' => 'webp'],
      '2x' => ['width' => 240, 'quality' => 100,'format' => 'webp']
    ],
    'cover-default-jpg' => [
      '1x' => ['width' => 320, 'quality' => 80,'format' => 'webp'],
      '2x' => ['width' => 640, 'quality' => 80,'format' => 'webp']
    ],
    'cover-default-png' => [
      '1x' => ['width' => 320, 'quality' => 100,'format' => 'webp'],
      '2x' => ['width' => 640, 'quality' => 100,'format' => 'webp']
    ],
    'img-wide-jpg' => [
      '1x' => ['width' => 1200, 'quality' => 80,'format' => 'webp'],
      '2x' => ['width' => 2400, 'quality' => 80,'format' => 'webp']
    ],
    'img-wide-png' => [
      '1x' => ['width' => 1200, 'quality' => 100,'format' => 'webp'],
      '2x' => ['width' => 2400, 'quality' => 100,'format' => 'webp']
    ],
    'img-default-jpg' => [
      '1x' => ['width' => 850, 'quality' => 80,'format' => 'webp'],
      '2x' => ['width' => 1700, 'quality' => 80,'format' => 'webp']
    ],
    'img-default-png' => [
      '1x' => ['width' => 850, 'quality' => 100,'format' => 'webp'],
      '2x' => ['width' => 1700, 'quality' => 100,'format' => 'webp']
    ]
  ]
];