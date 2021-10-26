<?php
/** @var Kirby\Cms\Page $page */
$template = $page->template();
$entry = "templates/$template/index.js";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($template == 'home', $site->title(), $page->title() .' - '. $site->title()) ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">
  <?php snippet("favicon") ?>
  <?= vite()->client() ?>
  <!-- Include the shared css ... -->
  <?= vite()->css() ?>
  <!-- ... and the template's css -->
  <?= vite()->css($entry) ?>
  <?php snippet("darkmode") ?>
</head>
<body class="bg-white dark:bg-black dark:text-white">
  <?php snippet("menu") ?>
  <main>