<script setup>
import Header from '../common/Header.vue'
defineProps({
    posts:Array,
})

</script>


<template>
<Header/>
    <div>
        <h1 v-for="post in posts" :key="post.id">{{ post.title }}</h1>
    </div>
</template>






    
