<template lang="">
         <section class="px-5 sm:px-8 py-6">
        <h3 class="text-lg font-bold text-[#111827]">Comments (3)</h3>

        <!-- New comment form (UI only) -->
        <form class="mt-4 rounded-xl border border-[#F5E7EB] bg-[#F9FAFB] p-4">
          <label for="comment" class="sr-only">Write a comment</label>
          <textarea
            id="comment"
            rows="4"
            placeholder="Write your comment…"
            class="w-full resize-y rounded-lg border border-[#F5E7EB] bg-white p-3 text-sm text-[#111827] placeholder:text-[#6B7280] outline-none focus:ring-2 focus:ring-[#1E5A8A]/20 focus:border-[#1E5A8A]"
          ></textarea>
          <div class="mt-3 flex items-center justify-between">
            <p class="text-xs text-[#6B7280]">Be respectful. Markdown supported later.</p>
            <button type="button" class="inline-flex items-center justify-center h-9 px-4 rounded-lg font-semibold text-white bg-[#1E5A8A] hover:opacity-95">
              Post Comment
            </button>
          </div>
        </form>

        <!-- Comment list -->
        <ol class="mt-6 space-y-4">
          <!-- Comment -->
          <li class="rounded-xl border border-[#F5E7EB] bg-white p-4">
            <div class="flex items-start gap-3">
              <span class="grid h-9 w-9 place-items-center rounded-full bg-[#1E5A8A] text-white text-[12px] font-semibold">SU</span>
              <div class="min-w-0 flex-1">
                <div class="flex flex-wrap items-center gap-2 text-sm">
                  <span class="font-semibold text-[#111827]">Subscriber User</span>
                  <span class="text-[#6B7280]">•</span>
                  <time class="text-[#6B7280]" datetime="2025-09-12T10:00:00Z">Sep 12, 2025</time>
                </div>
                <p class="mt-2 text-sm text-[#111827]">
                  Great walkthrough! The ownership checks in policies were especially helpful.
                </p>
                <div class="mt-2 flex items-center gap-3 text-xs text-[#6B7280]">
                  <button class="hover:text-[#111827]">Reply</button>
                  <button class="hover:text-[#111827]">Edit</button>
                  <button class="hover:text-[#111827]">Delete</button>
                </div>
              </div>
            </div>
          </li>

          <!-- Comment -->
          <li class="rounded-xl border border-[#F5E7EB] bg-white p-4">
            <div class="flex items-start gap-3">
              <span class="grid h-9 w-9 place-items-center rounded-full bg-[#1E5A8A] text-white text-[12px] font-semibold">AN</span>
              <div class="min-w-0 flex-1">
                <div class="flex flex-wrap items-center gap-2 text-sm">
                  <span class="font-semibold text-[#111827]">Another User</span>
                  <span class="text-[#6B7280]">•</span>
                  <time class="text-[#6B7280]" datetime="2025-09-11T09:00:00Z">Sep 11, 2025</time>
                </div>
                <p class="mt-2 text-sm text-[#111827]">
                  Could you add an example for queued notifications on new comments?
                </p>
              </div>
            </div>
          </li>

          <!-- Comment -->
          <li class="rounded-xl border border-[#F5E7EB] bg-white p-4">
            <div class="flex items-start gap-3">
              <span class="grid h-9 w-9 place-items-center rounded-full bg-[#1E5A8A] text-white text-[12px] font-semibold">AD</span>
              <div class="min-w-0 flex-1">
                <div class="flex flex-wrap items-center gap-2 text-sm">
                  <span class="font-semibold text-[#111827]">Admin</span>
                  <span class="text-[#6B7280]">•</span>
                  <time class="text-[#6B7280]" datetime="2025-09-11T12:30:00Z">Sep 11, 2025</time>
                </div>
                <p class="mt-2 text-sm text-[#111827]">
                  Thanks! We’ll publish an update with queue + mail examples soon.
                </p>
              </div>
            </div>
          </li>
        </ol>
      </section>
</template>
<script setup>

</script>
