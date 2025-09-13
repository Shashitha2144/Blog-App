<script setup>

defineProps({
    posts:Array,
})

</script>


<template>
    <div>
        <h1 v-for="post in posts" :key="post.id">{{ post.title }}</h1>
    </div>
</template>






    
