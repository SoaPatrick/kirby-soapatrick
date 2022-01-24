<?php

$boxItems = page('box')->children()->sortBy('published', 'desc')->listed()->limit(20);
$factoryItems = page('factory')->children()->sortBy('published', 'desc')->listed()->limit(20);
$labItems = page('lab')->children()->sortBy('published', 'desc')->listed()->limit(20);
$likeItems = page('likes')->children()->sortBy('published', 'desc')->listed()->limit(20);
$latestContent = new Collection();
$latestContent->add($boxItems);
$latestContent->add($factoryItems);
$latestContent->add($labItems);
$latestContent->add($likeItems);

echo '<?xml version="1.0" encoding="utf-8"?>';
?><rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title><?= $site->title() ?></title>
    <link><?= $site->url() ?></link>
    <lastBuildDate><?= $latestContent->sortBy('published', 'desc')->first()->modified('r') ?></lastBuildDate>
    <?php foreach ($latestContent->sortBy('published', 'desc')->limit(20) as $item): ?>
      <item>
        <title><?= Xml::encode($item->title()) ?></title>
        <link><?= $item->url() ?></link>
        <guid><?= $item->url() ?></guid>
        <pubDate><?= $item->published()->toDate('r') ?></pubDate>
        <?php
          $tags = $item->tags()->split();
          sort($tags);
        ?>
        <?php foreach ($tags as $tag): ?>
          <category><![CDATA[<?= html($tag) ?>]]></category>
        <?php endforeach; ?>
        <description>
          <![CDATA[
            <?php if ($item->format() == "standard"): ?>
                <?= html($item->text()->toBlocks()->excerpt(200)); ?>
            <?php elseif ($item->format() == "quote"): ?>
              <blockquote>
                <?= $item->quotetext(); ?>
                <cite><?= $item->quotesource()->html(); ?></cite>
              </blockquote>
            <?php elseif ($item->format() == "link"): ?>
              <?= $item->linktext() ?>
              <a href="<?= $item->linkurl() ?>"><?= $item->linkurl() ?></a>
            <?php elseif ($item->format() == "status"): ?>
              <?= $item->statustext() ?>
            <?php else: ?>
              <?= $item->description()->html(); ?>
            <?php endif; ?>
          ]]>
        </description>
        <content:encoded>
          <![CDATA[
            <?php if($item->intendedTemplate() == 'like'): ?>
              <?php $image = $item->cover()->toFile() ?>
              <img srcset="<?= $image->srcset('cover-default-' .$image->extension()); ?>">
              <p>By <?= $item->from() ?> in <?= $item->released() ?></p>
              <?php
                foreach ($item->text()->toBlocks() as $block):
                  echo $block;
                endforeach;
              ?>
            <?php elseif($item->intendedTemplate() == 'lab-item'): ?>
              <?php $image = $item->cover()->toFile() ?>
              <img srcset="<?= $image->srcset('img-wide-' .$image->extension()); ?>">
              <p><?= $item->cover()->toFile()->caption() ?></p>
            <?php elseif($item->intendedTemplate() == 'factory-item'): ?>
              <?php $image = $item->cover()->toFile() ?>
              <img srcset="<?= $image->srcset('img-default-' .$image->extension()); ?>">
              <?= $item->description()->html(); ?>
            <?php else: ?>
              <?php
                foreach ($item->text()->toBlocks() as $block):
                  echo $block;
                endforeach;
              ?>
            <?php endif; ?>
          ]]>
        </content:encoded>
      </item>
    <?php endforeach; ?>
  </channel>
</rss>
