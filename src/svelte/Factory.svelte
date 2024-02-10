<script>
  import { onMount } from "svelte";
  import { flip } from "svelte/animate";
  import { scale } from "svelte/transition";
  import { cubicInOut } from "svelte/easing";

  let factoryItems = [];
  let tags = [];
  let additionalLimit = 4; // Limit for every load more click
  let initialLimit = additionalLimit; // starting limit
  let page = 1; // current page
  let pages = 1; // last page
  let loadedfactoryItemsCount = initialLimit;
  let selectedTag = null;
  let isLoading = false;
  let errorMessage = "";

  const flipDuration = 500; // Duration of the flip animation
  const scaleDuration = 400; // Duration of the scale animation
  const flipOptions = {
    duration: flipDuration,
    easing: cubicInOut,
  };

  async function fetchTags() {
    let apiUrl = "/api/tags.json";

    try {
      const response = await fetch(apiUrl);
      if (!response.ok) {
        throw new Error("Error loading expertise data");
      }
      const data = await response.json();
      tags = data["factory-tags"];
    } catch (error) {
      console.error("Error loading expertises:", error);
    }
  }

  async function fetchfactoryItems(page, tag = null) {
    isLoading = true;
    errorMessage = "";

    let apiUrl = `/factory.json?page=${page}`;
    if (tag) {
      apiUrl += `&tag=${encodeURIComponent(tag)}`;
    }

    try {
      const response = await fetch(apiUrl);
      if (!response.ok) {
        throw new Error("Error loading filtered factoryItems data");
      }
      const data = await response.json();
      factoryItems = data.data;
      page = data.page;
      pages = data.pages;

      console.log("apiUrl", apiUrl);
      console.log("page", page);
      console.log("pages", pages);
    } catch (error) {
      console.error("Error:", error);
      errorMessage =
        "Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.";
    } finally {
      isLoading = false;
    }
  }

  function loadMore() {
    fetchfactoryItems(++page);
  }

  function selectTag(tag) {
    selectedTag = tag;
    fetchfactoryItems(page, tag);
  }

  // Apply scale-out animation to factory items that are to be removed
  function applyScaleOutToRemovedFactoryItems(newData) {
    const newIds = newData.map((c) => c.id);
    cases.forEach((c) => {
      if (!newIds.includes(c.id)) {
        c.scaleOut = true; // Mark for fade out
      }
    });
  }

  // Show all factory items without filter
  function showAllFactoryItems() {
    selectedTag = null;
    fetchfactoryItems(); // Fetch cases without filter
  }

  onMount(async () => {
    fetchTags();
    fetchfactoryItems(page);
  });
</script>

<div
  class="grid gap-gutter items-start max-w-content sm:max-w-widest w-full ml-auto sm:grid-cols-[1fr_var(--width--content)]"
>
  <div class="tag-list tag-list--vertical">
    <button
      class="hashtag justify-self-end {selectedTag === null ? 'active' : ''}"
      on:click={showAllFactoryItems}>All</button
    >
    {#each tags as tag}
      <button
        class="hashtag justify-self-end {tag.name === selectedTag
          ? 'active'
          : ''}"
        on:click|preventDefault={() => selectTag(tag.name)}
      >
        {tag.name}
      </button>
    {/each}
  </div>
  <div class="grid-factory">
    {#each factoryItems as item (item.uuid)}
      <article
        class="block"
        animate:flip={flipOptions}
        in:scale={{ delay: 100, duration: scaleDuration }}
        out:scale={{ delay: 0, duration: scaleDuration }}
        class:fade-out={item.scaleOut}
      >
        <a href={item.url} aria-label={item.title} class="img-link">
          <img src={item.cover} alt={item.title} class="rounded-md block" />
        </a>
      </article>
    {/each}
  </div>
</div>
<nav
  class="pagination mt-8 inline-grid ml-auto w-full gap-4 font-serif grid-cols-2 max-w-content"
>
  {#if page < pages}
    <button class="bold-link mt-8" on:click={loadMore} disabled={isLoading}>
      {#if isLoading}
        <div>loading...</div>
      {:else}
        Load more
      {/if}
    </button>
  {/if}
</nav>
