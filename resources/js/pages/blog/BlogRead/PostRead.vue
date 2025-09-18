<script setup>
import UserLayout from '@/layouts/UserLayout.vue';
import Breadcrumb from './components/Breadcrumb.vue';
import Comments from './components/Comments.vue';
import MetaRow from './components/MetaRow.vue';
import RelatedPosts from './components/RelatedPosts.vue';

const props = defineProps({
    post: Object,
});

defineOptions({ layout: UserLayout });
</script>

<template>
    <!-- Page container -->
    <main class="mx-auto max-w-4xl px-4 py-8">
        <!-- Breadcrumb / category trail (optional) -->
        <Breadcrumb />

        <!-- Article -->
        <article class="relative overflow-hidden rounded-2xl border border-[#F5E7EB] bg-white shadow-sm">
            <!-- Header -->
            <header class="px-5 pt-6 sm:px-8 sm:pt-8">
                <!-- Categories -->
                <div class="mb-3 flex flex-wrap items-center gap-2">
                    <a href="/categories/laravel" class="text-sm text-[#1E5A8A] hover:underline">Laravel</a>
                    <a href="/categories/vue" class="text-sm text-[#1E5A8A] hover:underline">Vue.js</a>
                    <a href="/categories/mvc" class="text-sm text-[#1E5A8A] hover:underline">MVC</a>
                    <!-- Status badge -->
                    <span class="inline-flex items-center gap-1 rounded-full bg-[#10B981]/10 px-2.5 py-1 text-xs font-semibold text-[#10B981]">
                        <span class="inline-block h-2 w-2 rounded-full bg-[#10B981]"></span>
                        Published
                    </span>
                </div>

                <h1 class="text-2xl font-extrabold tracking-tight text-[#111827] sm:text-3xl lg:text-4xl">
                    {{ props.post?.title ?? 'Building (MVC)' }}
                </h1>

                <!-- Meta row -->
                <MetaRow :post="props.post" />
            </header>

            <!-- Cover image -->
            <figure class="mt-5 sm:mt-6">
                <div class="relative w-full bg-[#F9FAFB] pt-[50%]">
                    <img
                        src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=1600&auto=format&fit=max"
                        alt="Laptop, code editor and notes on a desk"
                        class="absolute inset-0 h-full w-full object-cover"
                    />
                </div>
                <figcaption class="sr-only">Illustrative cover for the article</figcaption>
            </figure>

            <!-- Content -->
            <div class="px-5 pb-6 sm:px-8 sm:pb-8">

                <!-- Tags -->
                <Tags />
            </div>

            <!-- Comments -->
            <Comments :post="props.post"/>
        </article>

        <RelatedPosts />
    </main>
</template>
