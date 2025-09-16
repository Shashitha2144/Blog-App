<template lang="">
    <div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <header class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <img src="https://via.placeholder.com/96" alt="Author avatar" class="w-24 h-24 rounded-full object-cover shadow-sm" />
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">Author Name</h1>
                        <p class="text-sm text-gray-500">Short bio or tagline about the author goes here. Passionate about writing and developer experience.</p>
                        <div class="mt-2 text-xs text-gray-400">Member since Jan 2023 • Location</div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded shadow">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        New Post
                    </button>
                    <button class="px-3 py-2 bg-white border border-gray-200 text-sm rounded hover:bg-gray-50">Edit Profile</button>
                </div>
            </header>

            <!-- Stats -->
            <section class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg shadow-sm border">
                    <div class="text-xs text-gray-500">Posts</div>
                    <div class="mt-1 text-2xl font-semibold text-gray-900">24</div>
                    <div class="mt-2 text-xs text-green-600">+3 this month</div>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-sm border">
                    <div class="text-xs text-gray-500">Followers</div>
                    <div class="mt-1 text-2xl font-semibold text-gray-900">1.2k</div>
                    <div class="mt-2 text-xs text-green-600">+120 this month</div>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-sm border">
                    <div class="text-xs text-gray-500">Views</div>
                    <div class="mt-1 text-2xl font-semibold text-gray-900">48.3k</div>
                    <div class="mt-2 text-xs text-green-600">+8.1k this month</div>
                </div>
            </section>

            <!-- Main grid -->
            <main class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent posts -->
                <section class="lg:col-span-2 space-y-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">Recent Posts</h2>
                        <a class="text-sm text-indigo-600 hover:underline" href="#">View all</a>
                    </div>

                    <div class="space-y-4">
                        <article class="bg-white border rounded-lg p-4 flex gap-4 hover:shadow">
                            <img class="w-28 h-20 rounded object-cover" src="https://via.placeholder.com/160x120" alt="post thumbnail" />
                            <div class="flex-1">
                                <h3 class="text-md font-semibold text-gray-900">How to build a Blog with Vue</h3>
                                <p class="mt-1 text-sm text-gray-500">A concise guide to set up a performant blog using Vue, Vite, and Tailwind CSS.</p>
                                <div class="mt-3 flex items-center justify-between text-xs text-gray-400">
                                    <div class="flex items-center gap-3">
                                        <span>Mar 15, 2025</span>
                                        <span>•</span>
                                        <span>3 min read</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="px-2 py-1 text-xs bg-indigo-50 text-indigo-600 rounded">Edit</button>
                                        <button class="px-2 py-1 text-xs bg-red-50 text-red-600 rounded">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="bg-white border rounded-lg p-4 flex gap-4 hover:shadow">
                            <img class="w-28 h-20 rounded object-cover" src="https://via.placeholder.com/160x120" alt="post thumbnail" />
                            <div class="flex-1">
                                <h3 class="text-md font-semibold text-gray-900">Understanding Vue 3 Composition API</h3>
                                <p class="mt-1 text-sm text-gray-500">Practical examples and patterns for writing reusable logic with the Composition API.</p>
                                <div class="mt-3 flex items-center justify-between text-xs text-gray-400">
                                    <div class="flex items-center gap-3">
                                        <span>Feb 28, 2025</span>
                                        <span>•</span>
                                        <span>7 min read</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="px-2 py-1 text-xs bg-indigo-50 text-indigo-600 rounded">Edit</button>
                                        <button class="px-2 py-1 text-xs bg-red-50 text-red-600 rounded">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="bg-white border rounded-lg p-4 flex gap-4 hover:shadow">
                            <img class="w-28 h-20 rounded object-cover" src="https://via.placeholder.com/160x120" alt="post thumbnail" />
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
                                        <button class="px-2 py-1 text-xs bg-indigo-50 text-indigo-600 rounded">Edit</button>
                                        <button class="px-2 py-1 text-xs bg-red-50 text-red-600 rounded">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>

                <!-- Sidebar -->
                <aside class="space-y-4">
                    <div class="bg-white border rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-900">Profile</h3>
                        <p class="mt-2 text-sm text-gray-500">Manage your public profile and social links.</p>
                        <div class="mt-4 flex flex-col gap-2">
                            <button class="w-full text-left px-3 py-2 bg-indigo-600 text-white rounded text-sm">Edit Profile</button>
                            <button class="w-full text-left px-3 py-2 bg-gray-50 border border-gray-200 rounded text-sm">Connect Social</button>
                        </div>
                    </div>

                    <div class="bg-white border rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-900">Quick Actions</h3>
                        <ul class="mt-3 space-y-2 text-sm text-gray-600">
                            <li class="flex items-center justify-between">
                                <span>Drafts</span>
                                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded">4</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>Scheduled</span>
                                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded">1</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>Comments</span>
                                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded">12</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white border rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-900">Tags</h3>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="text-xs bg-gray-100 text-gray-700 px-2.5 py-1 rounded">Vue</span>
                            <span class="text-xs bg-gray-100 text-gray-700 px-2.5 py-1 rounded">Tailwind</span>
                            <span class="text-xs bg-gray-100 text-gray-700 px-2.5 py-1 rounded">JavaScript</span>
                            <span class="text-xs bg-gray-100 text-gray-700 px-2.5 py-1 rounded">Frontend</span>
                        </div>
                    </div>
                </aside>
            </main>
        </div>
    </div>
</template>
<script>

</script>
