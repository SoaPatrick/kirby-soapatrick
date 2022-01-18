<div class="search-panel" id="search-collapse">
  <form action="<?= page('search')->url() ?>" method="get">
    <label for="search-collapse__input">
      <input type="text" name="q" id="search-collapse__input" value="<?php echo get('s'); ?>" placeholder="Find Stuff..." aria-label="Find Stuff..." tabindex="-1" class="input-field">
    </label>
  </form>
</div>