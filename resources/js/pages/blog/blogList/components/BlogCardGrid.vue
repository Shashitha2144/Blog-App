<script setup>
import BlogCard from './BlogCard.vue'

 defineProps({
    posts:Array,
});


</script>

<template lang="">
    <div>
        <div v-if="posts && posts.length" role="list" aria-label="Blog posts" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                v-for="post in posts"
                :key="post.id"
                role="listitem"
                class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transform transition duration-200 hover:-translate-y-1"
            >
                <BlogCard :posts="post" />
            </div>
        </div>

        <p v-else class="text-center text-gray-500 py-8">
            No posts found.
        </p>
    </div>
</template>



