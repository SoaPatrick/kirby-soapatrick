<?php 

$template     = $page->template();
$title        = $site->title()->escape();
$description  = $site->description()->html();
$url          = $site->url();
$author_url   = url('patrick');
$image        = url('assets/img/512.png');
$noindex      = 'noindex';
$index        = 'index,follow,max-image-preview:large';
$is_single    = false;
$is_indexed   = false;

if( $template == 'article' ||  $template == 'factory-item' ||  $template == 'like') {
  $is_single    = true;
}

if( $template == 'home' || $template == 'box' || $template == 'article' || $template == 'factory' || $template == 'factory-item' || $template == 'lab' || $template == 'likes' || $template == 'like' || $template == 'patrick') {
  $is_indexed = true;
}

if($template != 'home') {
  $title = $page->title() .' - '. $site->title();
  $url = $page->url();
  if($page->description()->isNotEmpty()) {
    $description = $page->description()->html();
  }
  if($page->hasImages()) {
    if($page->cover()->exists() && $page->cover()->isNotEmpty()) {
      $image = $page->cover()->toFile()->url();
    } else {
      $image = $page->image()->url();
    }
  }
}

if($is_single) {
  if($page->description()->isNotEmpty()) {
    $description = $page->description()->html();
  } else {
    $description = html($page->text()->toBlocks()->excerpt(158));
  }
  $tags = $page->tags()->split();
  sort($tags);
  $is_single = true;
}

if (param('page')) {
  $is_indexed = false;
}

if (param('tag')) {
  $title = $page->title() .' : '. html(urldecode(param('tag'))) .' - '. $site->title();
  $is_indexed = false;
}

if (param('category')) {
  $title = $page->title() .' : '. html(urldecode(param('category'))) .' - '. $site->title();
  $is_indexed = false;
}

if (param('storage')) {
  $title = $page->title() .' : '. html(urldecode(param('storage'))) .' - '. $site->title();
  $is_indexed = false;
}

if($is_indexed) {
  $robots = $index;
} else {
  $robots = $noindex;
}

?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?></title>
<meta name="robots" content="<?= $robots ?>">
<meta name="google-site-verification" content="URerj3SSC3cZTHRcRZuBjUABChejPH6v6IRcxKEkNXQ" />
<meta name="description" content="<?= $description ?>">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="article">
<meta property="og:title" content="<?= $title ?>">
<meta property="og:description" content="<?= $description ?>">
<meta property="og:url" content="<?= $url ?>">
<meta property="og:image" content="<?= $image ?>">
<meta property="article:author" content="<?= $author_url ?>">
<?php if($is_single): ?>
  <?php foreach ($tags as $tag): ?>
    <meta property="article:tag" content="<?= html($tag) ?>">
  <?php endforeach; ?>
  <meta property="article:published_time" content="<?= $page->published()->toDate('Y-m-d H:i:s') ?> +0000 UTC">
  <meta property="article:modified_time" content="<?= $page->modified('Y-m-d H:i:s') ?>">
<?php endif; ?>
<meta name="twitter:description" content="<?= $description ?>">
<meta name="twitter:url" content="<?= $url ?>">
<meta name="twitter:title" content="<?= $title ?>">
<meta name="twitter:image" content="<?= $image ?>">