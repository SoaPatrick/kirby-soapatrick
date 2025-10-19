<?php

$pageParam = intval($kirby->request()->get('page', 1));
$limitParam = intval($kirby->request()->get('limit', 12));
$tagParam = $kirby->request()->get('tag', null);
$start = 0;

$data = $pages->find('lab')->children()->listed()->flip();
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
$LabItemArray = [];

foreach($data as $labItem) {
    $tags = [];
    foreach ($labItem->tags()->split() as $tag) {
        $tags[] = $tag;
    }

    $LabItemArray[] = [
        'uuid'  => (string)$labItem->uuid(),
        'url'   => (string)$labItem->url(),
        'title' => (string)$labItem->title(),
        'format' => (string)$labItem->format(),
        'cover'  => [
            'width' => $labItem->cover()->toFile()->width(),
            'height' => $labItem->cover()->toFile()->height(),
            'srcset' => $labItem->cover()->toFile()->srcset('cover-default-crop-' .$labItem->cover()->toFile()->extension()),
        ],
        'tags' => $tags,
        'src' => (function() use ($labItem) {
            $format = (string)$labItem->format();
            if ($format === 'video') {
                if ($file = $labItem->video()->toFile()) {
                    return $file->url();
                }
                return null;
            }
            if ($cover = $labItem->cover()->toFile()) {
                return $cover->url();
            }
            return null;
        })(),
    ];
}

$json['limit'] = $limitParam;
$json['pages'] = $totalPages;
$json['page']  = $pageParam;
$json['total'] = $count;
$json['data'] = $LabItemArray;

echo json_encode($json);