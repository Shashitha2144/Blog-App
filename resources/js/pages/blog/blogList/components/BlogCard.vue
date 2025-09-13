<script setup>

defineProps({
  posts:Object,
})

</script>



<template>
  <article class="group relative overflow-hidden rounded-xl border border-[#F5E7EB] bg-white shadow-sm hover:shadow transition-shadow">
    <!-- Cover Image -->
    <a :href="post?.url ?? '#'" class="block relative w-full pt-[56.25%] bg-[#F9FAFB]">
      <img
        class="absolute inset-0 w-full h-full object-cover"
        :src="post?.image ?? 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?q=80&w=1280&auto=format&fit=crop'"
        :alt="post.title ?? 'Post cover'"
      />
      <span
        class="absolute left-3 top-3 inline-flex items-center gap-1 rounded-full bg-[#10B981]/10 text-[#10B981] px-2.5 py-1 text-xs font-semibold backdrop-blur"
        v-if="post?.status === 'published' || !post?.status"
      >
        <span class="inline-block h-2.5 w-2.5 rounded-full bg-[#10B981]"></span>
        Published
      </span>
      <span
        class="absolute left-3 top-3 inline-flex items-center gap-1 rounded-full bg-[#F97316]/10 text-[#F97316] px-2.5 py-1 text-xs font-semibold backdrop-blur"
        v-else
      >
        <span class="inline-block h-2.5 w-2.5 rounded-full bg-[#F97316]"></span>
        Draft
      </span>
    </a>

    <!-- Body -->
    <div class="p-4 sm:p-5">
      <!-- Title -->
      <a :href="post?.url ?? '#'" class="no-underline">
        <h3 class="text-lg font-bold tracking-tight text-[#111827] group-hover:text-[#1E5A8A]">
          {{ post.posts?.title ?? 'Untitled post' }}
        </h3>
      </a>

      <!-- Excerpt -->
      <p class="mt-2 line-clamp-3 text-sm leading-6 text-[#6B7280]">
        {{ post?.excerpt ?? 'No excerpt available.' }}
      </p>

      <!-- Meta: Author + Date -->
      <div class="mt-4 flex flex-wrap items-center gap-3 text-xs text-[#6B7280]">
        <div class="inline-flex items-center gap-2">
          <span class="grid h-6 w-6 place-items-center rounded-full bg-[#1E5A8A] text-white text-[10px] font-semibold">
            {{ post?.authorInitials ?? 'AU' }}
          </span>
          <span class="font-medium text-[#111827]">{{ post?.author ?? 'Author' }}</span>
        </div>

        <span class="hidden sm:inline text-[#F5E7EB]">|</span>

        <div class="inline-flex items-center gap-1.5">
          <svg class="h-4 w-4 text-[#6B7280]" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="currentColor" d="M7 11h10v2H7v-2Zm-2 8h14V5H5v14Zm0 2a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5Z"/>
          </svg>
          <time :datetime="post?.published_at ?? ''">{{ formattedDate }}</time>
        </div>

        <span class="hidden sm:inline text-[#F5E7EB]">|</span>

        <div class="inline-flex items-center gap-1.5">
          <svg class="h-4 w-4 text-[#6B7280]" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="currentColor" d="M12 7a5 5 0 1 0 5 5a5.006 5.006 0 0 0-5-5Zm0-5a1 1 0 0 1 1 1v2.071A8.009 8.009 0 0 1 20 13a1 1 0 0 1-2 0a6 6 0 1 0-12 0a1 1 0 0 1-2 0a8.009 8.009 0 0 1 7-7.929V3a1 1 0 0 1 1-1Z"/>
          </svg>
          {{ post?.read_time ?? '—' }}
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="border-t border-[#F5E7EB] bg-[#F9FAFB] px-4 py-3 sm:px-5">
      <div class="flex flex-wrap items-center justify-between gap-3">
        <!-- Metrics -->
        <div class="flex items-center gap-4 text-xs text-[#6B7280]">
          <span class="inline-flex items-center gap-1.5">
            <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" aria-hidden="true">
              <path fill="currentColor" d="M12 7c-5.33 0-8 5-8 5s2.67 5 8 5s8-5 8-5s-2.67-5-8-5Zm0 8a3 3 0 1 1 0-6a3 3 0 0 1 0 6Z"/>
            </svg>
            {{ post?.views ?? '0' }}
          </span>

          <span class="inline-flex items-center gap-1.5">
            <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" aria-hidden="true">
              <path fill="currentColor" d="M4 21v-6H2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H8l-4 4Zm2-6v3.586L9.586 15H20V5H4v10h2Z"/>
            </svg>
            {{ post?.comments_count ?? '0' }}
          </span>
        </div>

        <!-- Actions (UI only) -->
        <div class="flex items-center gap-2">
          <a :href="post?.edit_url ?? '#'"
             class="inline-flex items-center justify-center h-9 px-3 rounded-lg font-semibold text-white bg-[#1E5A8A] hover:opacity-95">
            Publish
          </a>
        </div>
      </div>
    </div>
  </article>
</template>