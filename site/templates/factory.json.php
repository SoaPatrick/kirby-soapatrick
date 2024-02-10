<?php

$itemsPerPage = 4;
$pageParam = intval($kirby->request()->get('page', 1));
$tagParam = $kirby->request()->get('tag', null);
if ($pageParam < 1) $pageParam = 1;

$data = $pages->find('factory')->children()->listed()->flip();

if ($tagParam) {
  $data = $data->filterBy('tags', $tagParam, ',');
}

$totalPages = ceil($data->count() / $itemsPerPage);
$start = ($pageParam - 1) * $itemsPerPage;

$data = $data->slice($start, $itemsPerPage);

$json = [];

$json['pages'] = $totalPages;
$json['page']  = $pageParam;

$dataArray = [];

foreach($data as $factoryItem) {

  $tags = [];
  foreach ($factoryItem->tags()->split() as $tag) {
    $tags[] = $tag;
  }

  $dataArray[] = [
    'uuid'  => (string)$factoryItem->uuid(),
    'url'   => (string)$factoryItem->url(),
    'title' => (string)$factoryItem->title(),
    'cover'  => (string)$factoryItem->cover()->toFile()->url(),
    'tags' => $tags,
  ];
}

$json['data'] = $dataArray;

echo json_encode($json);