<?php $template = $page->template() ?>

<!DOCTYPE html>
<html lang="en">
<head class="h-full">
  <?php snippet("layouts/metatags") ?>
  <?php snippet("layouts/favicon") ?>
  <?= vite()->js('index.js') ?>
  <?= vite()->css('index.js') ?>
</head>
<body class="font-sans font-thin text-blue-200 dark:text-egg-200 bg-egg-200 dark:bg-blue-200 selection:bg-primary selection:text-egg-200 h-full">

  <?php snippet("layouts/search") ?>
  <?php snippet("layouts/waves") ?>
  <?php snippet("layouts/navigation") ?>
  
  <div class="mx-auto max-w-widest min-h-screen px-8 sm:px-4 flex flex-col">
    <main class="main sm:grid content-start mt-8 sm:mt-24 max-w-content sm:max-w-full w-full mx-auto flex-1">