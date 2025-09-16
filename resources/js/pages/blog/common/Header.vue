<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
const page = usePage();

const authUser = computed(() => page.props.auth?.user ?? null);
const name = computed(() => authUser.value?.role?? 'Guest');
console.log(name);
</script>

<template>
    <header class="sticky top-0 z-40 border-b border-[#F5E7EB] bg-[#F9FAFB] shadow-sm">
        <!-- Skip link -->
        <a id="main-content" class="sr-only px-4 py-2 focus:not-sr-only" href="#main">Skip to content</a>

        <div class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-4 py-2">
            <!-- Left: Brand + Desktop Nav -->
            <div class="flex items-center gap-3">
                <div>
                    <template>
                        <!-- Admin button -->
                        <Link v-if="isAdmin" href="/admin" class="btn">Admin</Link>

                        <!-- Author button -->
                        <Link v-if="isAuthor" href="/author" class="btn">Author</Link>

                        <!-- Guest-only CTA -->
                        <Link v-if="!$page.props.auth.user" href="/register" class="btn">Register</Link>
                        <!-- ... -->
                    </template>
                </div>

                <!-- Mobile menu button (UI only) -->
                <button
                    class="grid h-9 w-9 place-items-center rounded-lg border border-[#F5E7EB] bg-[#F9FAFB] text-[#111827] md:hidden"
                    aria-label="Open menu"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                >
                    <svg class="h-6 w-6" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="currentColor" d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z" />
                    </svg>
                </button>

                <!-- Brand -->
                <a href="/" class="flex items-center gap-3 text-[#111827] no-underline">
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-[#1E5A8A] text-white shadow select-none">B</span>
                    <span class="text-lg font-semibold">Blog</span>
                </a>

                <!-- Desktop Nav -->
                <nav class="ml-4 hidden items-center gap-2 md:flex" aria-label="Primary">
                    <a href="/" class="rounded px-2 py-1 text-[#6B7280] hover:text-[#111827]">{{ name }}</a>
                    <a href="/blogs" class="rounded px-2 py-1 text-[#6B7280] hover:text-[#111827]">Blog</a>
                    <a href="/about" class="rounded px-2 py-1 text-[#6B7280] hover:text-[#111827]">About</a>
                    <a href="/contact" class="rounded px-2 py-1 text-[#6B7280] hover:text-[#111827]">Contact</a>
                </nav>
            </div>

            <!-- Right: Search + Actions -->
            <div class="flex items-center gap-2">
                <!-- Search (visual only) -->
                <form class="flex items-center rounded-lg border border-[#F5E7EB] bg-white px-2 py-1">
                    <svg class="mr-2 h-4 w-4 text-[#6B7280]" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            fill="currentColor"
                            d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16a6.471 6.471 0 004.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"
                        />
                    </svg>
                    <input
                        type="search"
                        name="q"
                        placeholder="Search…"
                        class="w-40 bg-transparent text-[#111827] outline-none placeholder:text-[#6B7280]"
                    />
                </form>

                <!-- New Post (UI only) -->
                <a href="/blogs/create" class="inline-flex items-center gap-2 rounded-lg bg-[#1E5A8A] px-3 py-1 font-medium text-white">New Post</a>

                <button
                    class="grid h-9 w-9 place-items-center rounded-lg border border-[#F5E7EB] bg-[#F9FAFB] text-[#111827]"
                    aria-label="Notifications"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            fill="currentColor"
                            d="M12 22a2.1 2.1 0 0 0 2.09-2H9.91A2.1 2.1 0 0 0 12 22Zm6-6v-5a6 6 0 0 0-5-5.91V4a1 1 0 1 0-2 0v1.09A6 6 0 0 0 6 11v5l-2 2v1h16v-1Z"
                        />
                    </svg>
                </button>

                <!-- Auth links (visual only) -->
                <a href="/login" class="px-2 text-[#6B7280] hover:text-[#111827]">Log in</a>
                <a href="/register" class="px-2 text-[#6B7280] hover:text-[#111827]">Sign up</a>
            </div>
        </div>

        <!-- Mobile menu (hidden by default) -->
        <div id="mobile-menu" class="hidden border-t border-[#F5E7EB] bg-white md:hidden">
            <nav class="grid gap-1 p-2" aria-label="Mobile">
                <a href="/" class="px-2 py-1">Home</a>
                <a href="/blogs" class="px-2 py-1">Blog</a>
                <a href="/about" class="px-2 py-1">About</a>
                <a href="/contact" class="px-2 py-1">Contact</a>
                <hr class="my-1 border-[#F5E7EB]" />
                <a href="/login" class="px-2 py-1">Log in</a>
                <a href="/register" class="px-2 py-1">Sign up</a>
            </nav>
        </div>
    </header>
</template>
