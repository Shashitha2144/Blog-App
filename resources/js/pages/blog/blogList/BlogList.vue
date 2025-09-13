<script setup>
import Header from '../common/Header.vue'
import BlogCardGrid from './components/BlogCardGrid.vue'
import BlogCard from './components/BlogCard.vue'

defineProps({
  posts: Array,
})

</script>

<template>
  <Header />

  <main id="main" class="w-full mx-9 my-3">
    <BlogCardGrid :posts="posts" />
  </main>
</template>






    
