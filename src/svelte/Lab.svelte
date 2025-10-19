<script>
  import { onMount, tick } from "svelte";
  import { flip } from "svelte/animate";
  import { scale } from "svelte/transition";
  import { cubicInOut } from "svelte/easing";

  let labItems = [];
  let tags = [];
  let additionalLimit = 12; // Limit for every load more click
  let initialLimit = additionalLimit; // starting limit
  let page = 1; // current page
  let pages = 1; // last page
  let loadedLabItemsCount = initialLimit;
  let selectedTag = null;
  let isLoading = false;
  let errorMessage = "";
  let allLabItems = [];

  const flipDuration = 500; // Duration of the flip animation
  const scaleDuration = 400; // Duration of the scale animation
  const flipOptions = {
    duration: flipDuration,
    easing: cubicInOut,
  };

  async function fetchAllLabItems() {
    try {
      const response = await fetch('/lab.json?limit=10000'); // Use a high limit or implement a dedicated endpoint
      if (!response.ok) throw new Error('Error loading all lab items');
      const data = await response.json();
      allLabItems = data.data;
    } catch (error) {
      console.error(error);
    }
  }

  async function refreshLightbox() {
    await tick(); // warten bis die neuen <a> im DOM sind
    if (typeof window !== "undefined" && window.refreshFsLightbox) {
      window.refreshFsLightbox();
    }
  }

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

  // Fetch lab items
  async function fetchLabItems() {
    isLoading = true;
    errorMessage = "";

    let apiUrl = `/lab.json?limit=${loadedLabItemsCount}&page=${page}`;
    if (selectedTag) {
      apiUrl += `&tag=${encodeURIComponent(selectedTag)}`;
    }

    try {
      const response = await fetch(apiUrl);
      if (!response.ok) {
        throw new Error("Error loading filtered labItems data");
      }
      const data = await response.json();
      labItems = data.data;
      page = data.page;
      pages = data.pages;

      const newLabItems = data.data.map((c) => ({
        ...c,
        isNew: true,
        scaleOut: false,
      }));
      applyScaleOutToRemovedLabItems(newLabItems);

      if (page === 1 || selectedTag !== null) {
        labItems = newLabItems;
      } else {
        labItems = [...labItems, ...newLabItems];
      }
    } catch (error) {
      console.error("Error:", error);
      errorMessage =
        "An error occurred while loading lab items. Please try again later.";
    } finally {
      isLoading = false;
    }
  }

  // Apply scale-out animation to lab items that are to be removed
  function applyScaleOutToRemovedLabItems(newData) {
    const newIds = newData.map((c) => c.id);
    labItems.forEach((c) => {
      if (!newIds.includes(c.id)) {
        c.scaleOut = true; // Mark for fade out
      }
    });
  }

  // Load more lab items
  function loadMore() {
    loadedLabItemsCount += additionalLimit;
    fetchLabItems();
  }

  // Handle tag selection
  function handleTagSelection(tag) {
    selectedTag = slugify(tag);
    fetchLabItems();

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
    window.history.replaceState({}, "", url);
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
    window.history.replaceState({}, "", url);
  }

  // Show all lab items without filter
  function showAllLabItems() {
    removeTagFromUrl();
    selectedTag = null;
    fetchLabItems(); // Fetch lab items without filter
  }

  // Fetch lab items on mount
  onMount(async () => {
    const path = decodeURIComponent(window.location.pathname);
    const segments = path.split("/");
    const tagSegment = segments.find((segment) => segment.startsWith("tag:"));

    if (tagSegment) {
      selectedTag = tagSegment.substring(4);
    }

    await fetchTags();
    await fetchAllLabItems();
    await fetchLabItems();
  });

  onMount(refreshLightbox);
  $: labItems, refreshLightbox();
  $: usedTagNames = Array.from(new Set(allLabItems.flatMap(item => item.tags || [])));
  $: visibleTags = tags.filter(tag => usedTagNames.includes(tag.name));
</script>

<div
  class="grid gap-gutter items-start max-w-content sm:max-w-widest w-full ml-auto sm:grid-cols-[1fr_var(--width--content)]"
>
  <div class="tag-list tag-list--vertical">
    <button
      class="hashtag justify-self-end {selectedTag === null ? 'active' : ''}"
      on:click={showAllLabItems}>All</button
    >
    {#each visibleTags as tag}
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
      {#each labItems as item (item.uuid)}
        <article
          class="block"
          animate:flip={flipOptions}
          in:scale={{ delay: 100, duration: scaleDuration }}
          out:scale={{ delay: 0, duration: scaleDuration }}
          class:fade-out={item.scaleOut}
        >
          <a
            class={"img-link img-link--lightbox" + (item.format === "video" ? " video-link" : "")}
            href={item.src}
            aria-label={item.title}
            data-fslightbox={item.uuid}
          >
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
