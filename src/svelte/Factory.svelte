<script>
  import { onMount } from "svelte";
  import { flip } from "svelte/animate";
  import { scale } from "svelte/transition";
  import { cubicInOut } from "svelte/easing";

  let factoryItems = [];
  let tags = [];
  let additionalLimit = 12; // Limit for every load more click
  let initialLimit = additionalLimit; // starting limit
  let page = 1; // current page
  let pages = 1; // last page
  let loadedFactoryItemsCount = initialLimit;
  let selectedTag = null;
  let isLoading = false;
  let errorMessage = "";

  const flipDuration = 500; // Duration of the flip animation
  const scaleDuration = 400; // Duration of the scale animation
  const flipOptions = {
    duration: flipDuration,
    easing: cubicInOut,
  };

  // Fetch tags
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

  // Fetch factory items
  async function fetchFactoryItems() {
    isLoading = true;
    errorMessage = "";

    let apiUrl = `/factory.json?limit=${loadedFactoryItemsCount}&page=${page}`;
    if (selectedTag) {
      apiUrl += `&tag=${encodeURIComponent(selectedTag)}`;
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

      const newFactoryItems = data.data.map((c) => ({
        ...c,
        isNew: true,
        scaleOut: false,
      }));
      applyScaleOutToRemovedFactoryItems(newFactoryItems);

      if (page === 1 || selectedTag !== null) {
        factoryItems = newFactoryItems;
      } else {
        factoryItems = [...factoryItems, ...newFactoryItems];
      }
    } catch (error) {
      console.error("Error:", error);
      errorMessage =
        "An error occurred while loading factory items. Please try again later.";
    } finally {
      isLoading = false;
    }
  }

  // Apply scale-out animation to factory items that are to be removed
  function applyScaleOutToRemovedFactoryItems(newData) {
    const newIds = newData.map((c) => c.id);
    factoryItems.forEach((c) => {
      if (!newIds.includes(c.id)) {
        c.scaleOut = true; // Mark for fade out
      }
    });
  }

  // Load more factory items
  function loadMore() {
    loadedFactoryItemsCount += additionalLimit;
    fetchFactoryItems();
  }

  // Handle tag selection
  function handleTagSelection(tag) {
    selectedTag = slugify(tag);
    fetchFactoryItems();

    const url = new URL(window.location);
    let path = url.pathname;

    if (path.endsWith("/")) {
      path = path.slice(0, -1);
    }

    const pathSegments = path.split("/");
    const tagIndex = pathSegments.findIndex((segment) =>
      segment.startsWith("tag:")
    );

    if (tagIndex !== -1) {
      pathSegments[tagIndex] = `tag:${tag}`;
    } else {
      pathSegments.push(`tag:${tag}`);
    }

    url.pathname = pathSegments.join("/");
    window.history.pushState({}, "", url);
  }

  //
  function slugify(text) {
    if (!text) return;
    return text
      .toString()
      .toLowerCase()
      .trim()
      .replace(/\s+/g, "-")
      .replace(/[^\w\-]+/g, "")
      .replace(/\-\-+/g, "-");
  }

  // Remove a URL parameter
  function removeTagFromUrl(tag) {
    const url = new URL(window.location);
    const path = url.pathname;
    const newPath = path.replace(/\/tag:[^\/]*/g, "");
    url.pathname = newPath;
    window.history.pushState({}, "", url);
  }

  // Show all factory items without filter
  function showAllFactoryItems() {
    removeTagFromUrl();
    selectedTag = null;
    fetchFactoryItems(); // Fetch factory items without filter
  }

  // Fetch factory items on mount
  onMount(async () => {
    const path = decodeURIComponent(window.location.pathname);
    const segments = path.split("/");
    const tagSegment = segments.find((segment) => segment.startsWith("tag:"));

    if (tagSegment) {
      selectedTag = tagSegment.substring(4);
    }

    fetchTags();
    fetchFactoryItems();
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
        class="hashtag justify-self-end {slugify(tag.name) ===
        slugify(selectedTag)
          ? 'active'
          : ''}"
        on:click|preventDefault={() => handleTagSelection(tag.name)}
      >
        {tag.name}
      </button>
    {/each}
  </div>
  <div>
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
            <img
              srcset={item.cover.srcset}
              alt={item.title}
              width={item.cover.width}
              height={item.cover.height}
              class="rounded-md block aspect-square bg-blue-100"
              loading="lazy"
            />
          </a>
        </article>
      {/each}
    </div>
    <nav class="pagination mt-8 ml-auto w-full gap-4 font-serif max-w-content">
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
  </div>
</div>
