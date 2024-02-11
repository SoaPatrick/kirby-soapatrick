<?php

$pageParam = intval($kirby->request()->get('page', 1));
$limitParam = intval($kirby->request()->get('limit', 12));
$tagParam = $kirby->request()->get('tag', null);
$start = 0;

$data = $pages->find('factory')->children()->listed()->flip();
$count = $data->count();

function slugify($text) {
  $text = strtolower(trim($text));
  $text = preg_replace('/\s+/', '-', $text);
  $text = preg_replace('/[^\w\-]+/', '', $text);
  $text = preg_replace('/\-\-+/', '-', $text);
  return $text;
}

if ($tagParam) {
  $tagParam = slugify($tagParam);
  $data = $data->filter(function ($item) use ($tagParam) {
    $tags = explode(',', $item->tags());
    $tags = array_map('slugify', $tags); // Slugify jedes Tag
    return in_array($tagParam, $tags);
  });
  $count = $data->count();
}

$totalPages = ceil($count / $limitParam);
$data = $data->slice($start, $limitParam);

$json = [];
$FactoryItemArray = [];

foreach($data as $factoryItem) {
  $tags = [];
  foreach ($factoryItem->tags()->split() as $tag) {
    $tags[] = $tag;
  }

  $FactoryItemArray[] = [
    'uuid'  => (string)$factoryItem->uuid(),
    'url'   => (string)$factoryItem->url(),
    'title' => (string)$factoryItem->title(),
    'cover'  => (string)$factoryItem->cover()->toFile()->url(),
    'tags' => $tags,
  ];
}

$json['limit'] = $limitParam;
$json['pages'] = $totalPages;
$json['page']  = $pageParam;
$json['total'] = $count;
$json['data'] = $FactoryItemArray;

echo json_encode($json);