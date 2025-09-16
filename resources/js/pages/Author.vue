<script setup>
import { ref } from 'vue'
import { useForm, router } from '@inertiajs/vue3'

const showModal = ref(false)

function openModal() {
    showModal.value = true
}

function closeModal() {
    showModal.value = false
}

// minimal post form
const form = useForm({
    title: '',
    excerpt: '',
    content: '',
})

function submit() {
    form.post('/blogs', {
        preserveScroll: true,
        onSuccess: () => {
            closeModal()
            form.reset()
            // reload current page to show new post in list
            router.reload()
        },
    })
}

</script>


<template lang="">
    <div>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <!-- Header -->
            <header class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                <div class="flex items-center gap-4">
                    <img src="https://via.placeholder.com/96" alt="Author avatar" class="h-24 w-24 rounded-full object-cover shadow-sm" />
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">Author Name</h1>
                        <p class="text-sm text-gray-500">
                            Short bio or tagline about the author goes here. Passionate about writing and developer experience.
                        </p>
                        <div class="mt-2 text-xs text-gray-400">Member since Jan 2023 • Location</div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button  @click="openModal"
                        class="inline-flex items-center gap-2 rounded bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-indigo-700"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        New Post
                    </button>
                    <button class="rounded border border-gray-200 bg-white px-3 py-2 text-sm hover:bg-gray-50">Edit Profile</button>
                </div>
            </header>

            <!-- Stats -->
            <section class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="rounded-lg border bg-white p-4 shadow-sm">
                    <div class="text-xs text-gray-500">Posts</div>
                    <div class="mt-1 text-2xl font-semibold text-gray-900">24</div>
                    <div class="mt-2 text-xs text-green-600">+3 this month</div>
                </div>

                <div class="rounded-lg border bg-white p-4 shadow-sm">
                    <div class="text-xs text-gray-500">Followers</div>
                    <div class="mt-1 text-2xl font-semibold text-gray-900">1.2k</div>
                    <div class="mt-2 text-xs text-green-600">+120 this month</div>
                </div>

                <div class="rounded-lg border bg-white p-4 shadow-sm">
                    <div class="text-xs text-gray-500">Views</div>
                    <div class="mt-1 text-2xl font-semibold text-gray-900">48.3k</div>
                    <div class="mt-2 text-xs text-green-600">+8.1k this month</div>
                </div>
            </section>

            <!-- Main grid -->
            <main class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Recent posts -->
                <section class="space-y-4 lg:col-span-2">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">Recent Posts</h2>
                        <a class="text-sm text-indigo-600 hover:underline" href="#">View all</a>
                    </div>

                    <div class="space-y-4">
                        <article class="flex gap-4 rounded-lg border bg-white p-4 hover:shadow">
                            <img class="h-20 w-28 rounded object-cover" src="https://via.placeholder.com/160x120" alt="post thumbnail" />
                            <div class="flex-1">
                                <h3 class="text-md font-semibold text-gray-900">How to build a Blog with Vue</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    A concise guide to set up a performant blog using Vue, Vite, and Tailwind CSS.
                                </p>
                                <div class="mt-3 flex items-center justify-between text-xs text-gray-400">
                                    <div class="flex items-center gap-3">
                                        <span>Mar 15, 2025</span>
                                        <span>•</span>
                                        <span>3 min read</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="rounded bg-indigo-50 px-2 py-1 text-xs text-indigo-600">Edit</button>
                                        <button class="rounded bg-red-50 px-2 py-1 text-xs text-red-600">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="flex gap-4 rounded-lg border bg-white p-4 hover:shadow">
                            <img class="h-20 w-28 rounded object-cover" src="https://via.placeholder.com/160x120" alt="post thumbnail" />
                            <div class="flex-1">
                                <h3 class="text-md font-semibold text-gray-900">Understanding Vue 3 Composition API</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Practical examples and patterns for writing reusable logic with the Composition API.
                                </p>
                                <div class="mt-3 flex items-center justify-between text-xs text-gray-400">
                                    <div class="flex items-center gap-3">
                                        <span>Feb 28, 2025</span>
                                        <span>•</span>
                                        <span>7 min read</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="rounded bg-indigo-50 px-2 py-1 text-xs text-indigo-600">Edit</button>
                                        <button class="rounded bg-red-50 px-2 py-1 text-xs text-red-600">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="flex gap-4 rounded-lg border bg-white p-4 hover:shadow">
                            <img class="h-20 w-28 rounded object-cover" src="https://via.placeholder.com/160x120" alt="post thumbnail" />
                            <div class="flex-1">
                                <h3 class="text-md font-semibold text-gray-900">Styling with Tailwind: Best Practices</h3>
                                <p class="mt-1 text-sm text-gray-500">Tips to keep utilities tidy and maintainable in larger projects.</p>
                                <div class="mt-3 flex items-center justify-between text-xs text-gray-400">
                                    <div class="flex items-center gap-3">
                                        <span>Jan 9, 2025</span>
                                        <span>•</span>
                                        <span>5 min read</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="rounded bg-indigo-50 px-2 py-1 text-xs text-indigo-600">Edit</button>
                                        <button class="rounded bg-red-50 px-2 py-1 text-xs text-red-600">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>

                <!-- Sidebar -->
                <aside class="space-y-4">
                    <div class="rounded-lg border bg-white p-4">
                        <h3 class="text-sm font-medium text-gray-900">Profile</h3>
                        <p class="mt-2 text-sm text-gray-500">Manage your public profile and social links.</p>
                        <div class="mt-4 flex flex-col gap-2">
                            <button class="w-full rounded bg-indigo-600 px-3 py-2 text-left text-sm text-white">Edit Profile</button>
                            <button class="w-full rounded border border-gray-200 bg-gray-50 px-3 py-2 text-left text-sm">Connect Social</button>
                        </div>
                    </div>

                    <div class="rounded-lg border bg-white p-4">
                        <h3 class="text-sm font-medium text-gray-900">Quick Actions</h3>
                        <ul class="mt-3 space-y-2 text-sm text-gray-600">
                            <li class="flex items-center justify-between">
                                <span>Drafts</span>
                                <span class="rounded bg-gray-100 px-2 py-0.5 text-xs text-gray-500">4</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>Scheduled</span>
                                <span class="rounded bg-gray-100 px-2 py-0.5 text-xs text-gray-500">1</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>Comments</span>
                                <span class="rounded bg-gray-100 px-2 py-0.5 text-xs text-gray-500">12</span>
                            </li>
                        </ul>
                    </div>

                    <div class="rounded-lg border bg-white p-4">
                        <h3 class="text-sm font-medium text-gray-900">Tags</h3>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="rounded bg-gray-100 px-2.5 py-1 text-xs text-gray-700">Vue</span>
                            <span class="rounded bg-gray-100 px-2.5 py-1 text-xs text-gray-700">Tailwind</span>
                            <span class="rounded bg-gray-100 px-2.5 py-1 text-xs text-gray-700">JavaScript</span>
                            <span class="rounded bg-gray-100 px-2.5 py-1 text-xs text-gray-700">Frontend</span>
                        </div>
                    </div>
                </aside>
            </main>
        </div>
    </div>

    <!-- New Post Modal -->
    <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/40" @click.self="closeModal"></div>
        <div class="relative mx-4 w-full max-w-2xl rounded-lg bg-white p-6 shadow-lg">
            <h3 class="mb-4 text-lg font-semibold">Create new post</h3>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input v-model="form.title" type="text" class="mt-1 block w-full rounded border-gray-200" required />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Excerpt</label>
                    <input v-model="form.excerpt" type="text" class="mt-1 block w-full rounded border-gray-200" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea v-model="form.content" rows="6" class="mt-1 block w-full rounded border-gray-200" required></textarea>
                </div>

                <div class="flex items-center justify-end gap-2">
                    <button type="button" @click="closeModal" class="rounded bg-gray-100 px-4 py-2">Cancel</button>
                    <button type="submit" :disabled="form.processing" class="rounded bg-indigo-600 px-4 py-2 text-white">
                        <span v-if="!form.processing">Publish</span>
                        <span v-else>Publishing…</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

