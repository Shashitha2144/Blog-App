<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const { post } = defineProps({
    post: Object,
});

const commentCount = ref(0);
commentCount.value = post.comment.length;

const form = useForm({
    content: '',
    post_id: post?.id,
});

function submitForm() {
    form.post('/comments', {
        onSuccess: () => form.reset('content'),
    });
}
</script>

<template lang="">
    <section class="px-5 py-6 sm:px-8">
        <h3 class="text-lg font-bold text-[#111827]">Comments {{ commentCount }}</h3>

        <form @submit.prevent="submitForm" class="mt-4 rounded-xl border border-[#F5E7EB] bg-[#F9FAFB] p-4">
            <label for="comment" class="sr-only">Write a comment</label>
            <textarea
                v-model="form.content"
                id="comment"
                rows="4"
                placeholder="Write your comment…"
                class="w-full resize-y rounded-lg border border-[#F5E7EB] bg-white p-3 text-sm text-[#111827] outline-none placeholder:text-[#6B7280] focus:border-[#1E5A8A] focus:ring-2 focus:ring-[#1E5A8A]/20"
            ></textarea>
            <div class="mt-3 flex items-center justify-between">
                <p class="text-xs text-[#6B7280]">Be respectful. Markdown supported later.</p>
                <button
                    type="submit"
                    class="inline-flex h-9 items-center justify-center rounded-lg bg-[#1E5A8A] px-4 font-semibold text-white hover:opacity-95"
                >
                    Post Comment
                </button>
            </div>
        </form>

        <!-- Comment list -->
        <ol class="mt-6 space-y-4" v-for="c in post?.comment ?? []" :key="c.id">
            <!-- Comment -->

            <li class="rounded-xl border border-[#F5E7EB] bg-white p-4">
                <div class="flex items-start gap-3">
                    <span class="grid h-9 w-9 place-items-center rounded-full bg-[#1E5A8A] text-[12px] font-semibold text-white">SU</span>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2 text-sm">
                            <span class="font-semibold text-[#111827]">{{ post.user.name }}</span>
                            <span class="text-[#6B7280]">•</span>
                            <time class="text-[#6B7280]" datetime="2025-09-12T10:00:00Z">{{ c.created_at }}</time>
                        </div>
                        <p class="mt-2 text-sm text-[#111827]">
                            {{ c.content ?? 'n/a' }}
                        </p>
                        <div class="mt-2 flex items-center gap-3 text-xs text-[#6B7280]">
                            <button class="hover:text-[#111827]">Reply</button>
                            <button class="hover:text-[#111827]">Edit</button>
                            <button class="hover:text-[#111827]">Delete</button>
                        </div>
                    </div>
                </div>
            </li>
        </ol>
    </section>
</template>
