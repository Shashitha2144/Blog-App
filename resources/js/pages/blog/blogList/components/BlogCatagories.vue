<template>
  <!-- Categories strip -->
  <section class="w-full border-b border-[#F5E7EB] bg-white">
    <div class="mx-auto max-w-7xl px-4 py-3">
      <div class="relative">
        <!-- Edge gradients (visual hint to scroll) -->
        <div class="pointer-events-none absolute left-0 top-0 h-full w-6 bg-gradient-to-r from-white to-transparent"></div>
        <div class="pointer-events-none absolute right-0 top-0 h-full w-6 bg-gradient-to-l from-white to-transparent"></div>

        <!-- Scroll area -->
        <nav aria-label="Categories" class="overflow-x-auto">
          <ul class="flex items-center gap-2 min-w-max">
            <!-- Active -->
            <li>
              <a href="#" class="inline-flex items-center gap-2 rounded-full border border-[#F5E7EB] bg-white/20 px-3 py-1.5 text-sm font-medium text-[#111827]">
                All
                <span class="rounded-full bg-white/20 px-2 py-[2px] text-xs font-semibold">128</span>
              </a>
            </li>

            <!-- Others -->
            <li>
              <a href="/categories/laravel" class="inline-flex items-center gap-2 rounded-full bg-[#F9FAFB] px-3 py-1.5 text-sm text-[#6B7280]">
                Laravel
                <span class="rounded-full bg-[#F9FAFB] px-2 py-[2px] text-xs text-[#6B7280]">32</span>
              </a>
            </li>

            <li>
              <a href="/categories/vue" class="inline-flex items-center gap-2 rounded-full bg-[#F9FAFB] px-3 py-1.5 text-sm text-[#6B7280]">
                Vue
                <span class="rounded-full bg-[#F9FAFB] px-2 py-[2px] text-xs text-[#6B7280]">24</span>
              </a>
            </li>

            <li>
              <a href="/categories/php" class="inline-flex items-center gap-2 rounded-full bg-[#F9FAFB] px-3 py-1.5 text-sm text-[#6B7280]">
                PHP
                <span class="rounded-full bg-[#F9FAFB] px-2 py-[2px] text-xs text-[#6B7280]">19</span>
              </a>
            </li>

            <li>
              <a href="/categories/javascript" class="inline-flex items-center gap-2 rounded-full border border-[#F5E7EB] bg-[#F9FAFB] px-3 py-1.5 text-sm text-[#111827] hover:bg-white hover:border-[#F5E7EB] transition">
                JavaScript
                <span class="rounded-full bg-[#F9FAFB] px-2 py-[2px] text-xs text-[#6B7280]">17</span>
              </a>
            </li>

            <li>
              <a href="/categories/tutorials" class="inline-flex items-center gap-2 rounded-full border border-[#F5E7EB] bg-[#F9FAFB] px-3 py-1.5 text-sm text-[#111827] hover:bg-white hover:border-[#F5E7EB] transition">
                Tutorials
                <span class="rounded-full bg-[#F9FAFB] px-2 py-[2px] text-xs text-[#6B7280]">12</span>
              </a>
            </li>

            <li>
              <a href="/categories/news" class="inline-flex items-center gap-2 rounded-full border border-[#F5E7EB] bg-[#F9FAFB] px-3 py-1.5 text-sm text-[#111827] hover:bg-white hover:border-[#F5E7EB] transition">
                News
                <span class="rounded-full bg-[#F9FAFB] px-2 py-[2px] text-xs text-[#6B7280]">9</span>
              </a>
            </li>

            <!-- Secondary accent example -->
            <li>
              <a href="/categories/tips" class="inline-flex items-center gap-2 rounded-full border border-[#F97316] bg-[#F97316]/10 px-3 py-1.5 text-sm font-medium text-[#92400E]">
                Tips
                <span class="rounded-full bg-[#F97316]/10 px-2 py-[2px] text-xs text-[#92400E]">4</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </section>
</template>
