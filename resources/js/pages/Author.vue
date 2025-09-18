<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3';
import { User } from 'lucide-vue-next';
import { ref } from 'vue';
import Button from './blog/common/Button.vue';

interface Post {
    id: number;
    title: string;
    content: string;
    publishedAt?: string;
    status?: string;
    user_id?: number;
}

interface User {
    id: number;
    name: string;
    email: string;
    role: string;
    image_url:string;
    is_published:boolean;
}
const { posts, author } = defineProps<{ posts: Post[]; author: User }>();

const showModal = ref<boolean>(false);
const editingPost = ref<Post | null>(null);
const isEditModel = ref<boolean>(false);

const createForm = useForm({
    title: '',
    content: '',
    status: 'Pending',
    user_id: author?.id ?? 1,
    image_url: "https://cdn-icons-png.flaticon.com/512/2593/2593549.png",
    is_published: false,
});

const editForm = useForm({
    title: '',
    content: '',
    status: 'Pending',
});

function openModal() {
    showModal.value = true;
    createForm.reset();
    isEditModel.value = false;
    editingPost.value = null;
}

function closeModal() {
    showModal.value = false;
}

async function submit() {
    try {
        await createForm.post('/blogs/publish', {
            preserveScroll: true,
            onSuccess: () => {
                closeModal();
                createForm.reset();
                router.reload();
            },
            onError: (errors) => {
                console.error(errors);
            },
        });
    } catch (e) {
        console.error(e);
    }
}

async function openEditPost(post: Post) {
    editingPost.value = { ...post };
    isEditModel.value = true;

    // populate editForm
    editForm.title = post.title ?? '';
    editForm.content = post.content ?? '';
    editForm.status = post.status ?? 'Pending';
    showModal.value = true;
}

async function handleSubmit() {
    if (isEditModel.value) {
        // use editForm for edits
        await editPost();
    } else {
        await submit();
    }
}

async function signOut() {
    await router.post('logout');
}

async function deletePost(id: number) {
    try {
        await router.delete(`/post/${id}`, {
            onSuccess: () => {
                router.reload();
            },
        });
    } catch (e) {
        console.error('Faild to delete post ', e);
    }
}

async function editPost() {
    if (!editingPost.value) return;

    await editForm.put(`/post/${editingPost.value.id}`, {
        onSuccess: () => {
            closeModal();
            editForm.reset();
            router.reload();
        },
        onError: (errors) => {
            console.error(errors);
        }
    });
}

</script>

<template lang="">
    <div>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <!-- Header -->
            <header class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                <div class="flex items-center gap-4">
                    <img
                        src="data:image/jpeg;base64,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"
                        alt="Author avatar"
                        class="h-24 w-24 rounded-full object-cover shadow-sm"
                    />
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">{{ author.name }}</h1>
                        <p class="text-sm text-gray-500">
                            Short bio or tagline about the author goes here. Passionate about writing and developer experience.
                        </p>
                        <div class="mt-2 text-xs text-gray-400">Member since Jan 2023 • Location</div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    
                    <Button 
                                            @click="openModal"
                        class="inline-flex items-center gap-2 rounded bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-indigo-700"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        New Post
                    </Button>
                    <Button variant="danger"
                        @click="signOut"
                        class="inline-flex items-center gap-2 rounded bg-gray-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-gray-700"
                    >
                        Sign out
                    </Button>
                </div>
            </header>

            <!-- Stats -->
            <section class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="rounded-lg border bg-white p-4 shadow-sm">
                    <div class="text-xs text-gray-500">Posts</div>
                    <div class="mt-1 text-2xl font-semibold text-gray-900">{{ posts.length }}</div>
                    <div class="mt-2 text-xs text-green-600">+3 this month</div>
                </div>
            </section>

            <!-- Main grid -->
            <main class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Recent posts -->
                <section v-for="post in posts" :key="post.id" class="space-y-4 lg:col-span-2">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">All Posts</h2>
                    </div>

                    <div class="space-y-4">
                        <article class="flex gap-4 rounded-lg border bg-white p-4 hover:shadow">
                            <img
                                class="h-20 w-28 rounded object-cover"
                                src="https://cdn-icons-png.flaticon.com/512/2593/2593549.png"
                                alt="post thumbnail"
                            />
                            <div class="flex-1">
                                <h3 class="text-md font-semibold text-gray-900">{{ post.title }}</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ post.content }}
                                </p>
                                <div class="mt-3 flex items-center justify-between text-xs text-gray-400">
                                    <div class="flex items-center gap-3">
                                        <span>{{ post.publishedAt }}</span>
                                        <span>•</span>
                                        <span>3 min read</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <Button variant="secondary" @click="openEditPost(post)">
                                            Edit
                                        </Button>
                                        <Button variant="danger"  @click="deletePost(post.id)" >Delete</Button>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- New Post Modal -->
    <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/40" @click.self="closeModal"></div>
        <div class="relative mx-4 w-full max-w-2xl rounded-lg bg-white p-6 shadow-lg">
            <h3 class="mb-4 text-lg font-semibold">Create new post</h3>

            <form @submit.prevent="handleSubmit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input v-if="!isEditModel" v-model="createForm.title" type="text" class="mt-1 block w-full rounded border-gray-200" required />
                    <input v-else v-model="editForm.title" type="text" class="mt-1 block w-full rounded border-gray-200" required />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea
                        v-if="!isEditModel"
                        v-model="createForm.content"
                        rows="6"
                        class="mt-1 block w-full rounded border-gray-200"
                        required
                    ></textarea>
                    <textarea
                        v-else
                        v-model="editForm.content"
                        rows="6"
                        class="mt-1 block w-full rounded border-gray-200"
                        required
                    ></textarea>
                </div>

                <div class="flex items-center justify-end gap-2">
                    <Button type="button" @click="closeModal" class="rounded bg-gray-100 px-4 py-2">Cancel</Button>
                    <Button v-if="!isEditModel" type="submit" :disabled="createForm.processing" class="rounded bg-indigo-600 px-4 py-2 text-white">
                        <span v-if="!createForm.processing">Publish</span>
                        <span v-else>Publishing…</span>
                    </Button>
                    <Button v-else type="submit" :disabled="editForm.processing" class="rounded bg-indigo-600 px-4 py-2 text-white">
                        <span v-if="!editForm.processing">Update</span>
                        <span v-else>Updating…</span>
                    </Button>
                </div>
            </form>
        </div>
    </div>
</template>
