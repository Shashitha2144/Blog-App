<script setup>
import Footer from '@/pages/blog/common/Footer.vue';
import Header from '@/pages/blog/common/Header.vue';
import SideBar from '@/pages/blog/common/SideBar.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col bg-gray-50">
        <Header/>

        <div class="flex-1 flex overflow-hidden">
            <SideBar/>

            <main class="flex-1 p-6 overflow-auto">
                <div class="max-w-7xl mx-auto">
                    <slot />
                </div>
            </main>
        </div>

        <Footer/>
    </div>
</template>
