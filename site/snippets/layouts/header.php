<?php
/** @var Kirby\Cms\Page $page */
$template = $page->template();
$entry = "templates/$template/index.js";
?>

<!DOCTYPE html>
<html lang="en">
<head class="h-full">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($template == 'home', $site->title(), $page->title() .' - '. $site->title()) ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">
  <?php snippet("layouts/favicon") ?>
  <?= vite()->client() ?>
  <!-- Include the shared css ... -->
  <?= vite()->css() ?>
  <!-- ... and the template's css -->
  <?= vite()->css($entry) ?>
</head>
<body class="font-sans font-thin text-blue-200 dark:text-egg-200 bg-egg-200 dark:bg-blue-200 selection:bg-primary selection:text-egg-200 h-full">
  <?php snippet("layouts/search") ?>
  <?php snippet("layouts/waves") ?>
  <div class="mx-auto max-w-widest min-h-screen px-8 sm:px-4 flex flex-col">
    <?php snippet("layouts/navigation") ?>
    <main class="main sm:grid content-start mt-8 sm:mt-16 max-w-content sm:max-w-full w-full mx-auto flex-1">