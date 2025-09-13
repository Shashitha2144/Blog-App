<script setup>
import Header from '../common/Header.vue';
import BlogCardGrid from './components/BlogCardGrid.vue';

import blogCategories from './components/BlogCatagories.vue';

defineProps({
    posts: Array,
});
</script>

<template>
    <Header />
    <blogCategories />
    <main id="main" class="mx-9 my-3 w-full">
        <BlogCardGrid :posts="posts" />
    </main>

    <!-- <PostRead/> -->
</template>
