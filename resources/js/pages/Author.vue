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
    image_url:"https://inc42.com/cdn-cgi/image/quality=75/https://asset.inc42.com/2014/04/write-a-great-blog-post.jpg",
    is_published:false,
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

function handleSubmit() {
    if (isEditModel.value) {
        editPost();
    } else {
        submit();
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
async function openEditPost(post: Post) {
    editingPost.value = { ...post };
    isEditModel.value = true;
    showModal.value = true;

    editForm.title = post.title;
    editForm.content = post.content;
    editForm.status = post.status ?? 'Pending';
    showModal.value = true;
}

async function editPost() {
  if (!editingPost.value) return;
  try {
      
    await editForm.put(`/post/${editingPost.value.id}`, {
      onSuccess: () => {
        closeModal();
        router.reload();
      },
      onError: (errors: any) => {
        console.error(errors);
      },
    });
  } catch (e) {
    console.error('Failed to update post', e);
  }
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
                                src="data:image/jpeg;base64,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"
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
                    <input v-if="isEditModel" v-model="editingPost.title" type="text" class="mt-1 block w-full rounded border-gray-200" required />
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
                        v-if="isEditModel"
                        v-model="editingPost.content"
                        rows="6"
                        class="mt-1 block w-full rounded border-gray-200"
                        required
                    ></textarea>
                </div>

                <div class="flex items-center justify-end gap-2">
                    <Button type="Button" @click="closeModal" class="rounded bg-gray-100 px-4 py-2">Cancel</Button>
                    <Button v-if="!isEditModel" type="submit" :disabled="createForm.processing" class="rounded bg-indigo-600 px-4 py-2 text-white">
                        <span v-if="!createForm.processing">Publish</span>
                        <span v-else>Publishing…</span>
                    </Button>
                    <Button v-if="isEditModel" type="submit" :disabled="editForm.processing" class="rounded bg-indigo-600 px-4 py-2 text-white">
                        <span v-if="!editForm.processing">Publish</span>
                        <span v-else>Publishing…</span>
                    </Button>
                </div>
            </form>
        </div>
    </div>
</template>
