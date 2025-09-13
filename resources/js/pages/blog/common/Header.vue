<template>
  <header class="sticky top-0 z-40 bg-[#F9FAFB] border-b border-[#F5E7EB] shadow-sm">
    <!-- Skip link -->
    <a id="main-content" class="sr-only focus:not-sr-only px-4 py-2" href="#main">Skip to content</a>

    <div class="mx-auto max-w-7xl px-4 py-2 flex items-center justify-between gap-3">
      <!-- Left: Brand + Desktop Nav -->
      <div class="flex items-center gap-3">
        <!-- Mobile menu button (UI only) -->
        <button
          class="md:hidden grid place-items-center w-9 h-9 rounded-lg bg-[#F9FAFB] border border-[#F5E7EB] text-[#111827]"
          aria-label="Open menu"
          aria-controls="mobile-menu"
          aria-expanded="false"
        >
          <svg class="w-6 h-6" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="currentColor" d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/>
          </svg>
        </button>

        <!-- Brand -->
        <a href="/" class="flex items-center gap-3 no-underline text-[#111827]">
          <span class="grid place-items-center w-9 h-9 rounded-xl text-white bg-[#1E5A8A] shadow select-none">B</span>
          <span class="text-lg font-semibold">Blog</span>
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center gap-2 ml-4" aria-label="Primary">
          <a href="/" class="text-[#6B7280] hover:text-[#111827] px-2 py-1 rounded">Home</a>
          <a href="/blogs" class="text-[#6B7280] hover:text-[#111827] px-2 py-1 rounded">Blog</a>
          <a href="/about" class="text-[#6B7280] hover:text-[#111827] px-2 py-1 rounded">About</a>
          <a href="/contact" class="text-[#6B7280] hover:text-[#111827] px-2 py-1 rounded">Contact</a>
        </nav>
      </div>

      <!-- Right: Search + Actions -->
      <div class="flex items-center gap-2">
        <!-- Search (visual only) -->
        <form class="flex items-center bg-white border border-[#F5E7EB] rounded-lg px-2 py-1">
          <svg class="w-4 h-4 text-[#6B7280] mr-2" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16a6.471 6.471 0 004.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
          </svg>
          <input
            type="search"
            name="q"
            placeholder="Search…"
            class="bg-transparent outline-none text-[#111827] placeholder:text-[#6B7280] w-40"
          />
        </form>

        <!-- New Post (UI only) -->
        <a href="/blogs/create" class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-[#1E5A8A] text-white font-medium">New Post</a>

        <button
          class="grid place-items-center w-9 h-9 rounded-lg bg-[#F9FAFB] border border-[#F5E7EB] text-[#111827]"
          aria-label="Notifications"
        >
          <svg class="w-5 h-5" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="currentColor" d="M12 22a2.1 2.1 0 0 0 2.09-2H9.91A2.1 2.1 0 0 0 12 22Zm6-6v-5a6 6 0 0 0-5-5.91V4a1 1 0 1 0-2 0v1.09A6 6 0 0 0 6 11v5l-2 2v1h16v-1Z"/>
          </svg>
        </button>

        <!-- Auth links (visual only) -->
        <a href="/login" class="text-[#6B7280] hover:text-[#111827] px-2">Log in</a>
        <a href="/register" class="text-[#6B7280] hover:text-[#111827] px-2">Sign up</a>
      </div>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden border-t border-[#F5E7EB] bg-white hidden">
      <nav class="grid gap-1 p-2" aria-label="Mobile">
        <a href="/" class="px-2 py-1">Home</a>
        <a href="/blogs" class="px-2 py-1">Blog</a>
        <a href="/about" class="px-2 py-1">About</a>
        <a href="/contact" class="px-2 py-1">Contact</a>
        <hr class="border-[#F5E7EB] my-1" />
        <a href="/login" class="px-2 py-1">Log in</a>
        <a href="/register" class="px-2 py-1">Sign up</a>
      </nav>
    </div>
  </header>
</template>



<script setup>

</script>
