<script setup>
import password from '@/routes/password';
import { router, useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const props = defineProps({
    posts: Array,
    users: Array,
});

const users = ref(props.users ?? []);
const posts = ref(props.posts ?? []);
const totalAdmins = computed(() => users.value.filter((u) => (u.role.toLowerCase() ?? '') === 'admin').length);
const totalAuthors = computed(() => users.value.filter((u) => (u.role.toLowerCase() ?? '') === 'author').length);
const totalUsers = computed(() => users.value.filter((u) => (u.role.toLowerCase() ?? '') === 'user').length);
const totalPosts = computed(() => posts.value.length);
const adminsAndAuthors = computed(() => users.value.filter((u) => ['admin', 'author'].includes((u.role ?? '').toLowerCase())));
const recentPosts = computed(() => posts.value.filter((u) => u.id % 2 === 0));
console.log(adminsAndAuthors.value);

const editingId = ref(null);

//form integration
const form = useForm({
    name: '',
    email: '',
    role: '',
    password:'',
});

function resetForm() {
    form.name = '';
    form.email = '';
    form.role = '';
    form.password=''
}

async function createOrUpdateUser() {
    if (!form.name || !form.email) return;

    if (editingId.value !== null) {
        await form.put(`/admin/user/${editingId.value}`, {
            preserveScroll: true,
            onSuccess: () => {
                closeModal();
                form.reset();
                router.reload();
            },
        });
    }
    if (editingId.value == null) {
        await form.post('/admin/user',{
            preserveScroll: true,
            onSuccess: () => {
                closeModal();
                form.reset();
                router.reload();
            },
        });
    }
}

async function editUser(u) {
    form.name = u.name;
    form.email = u.email;
    form.role = u.role;
  form.password = '';
    editingId.value = u.id;
}

function deleteUser(id) {
    router.delete(`/admin/${id}`);
    console.log(id)
}

function approvePost(id) {
    const p = posts.value.find((x) => x.id === id);
    if (p) p.approved = true;
}

function deletePost(id) {
    if (!confirm('Delete post?')) return;
    posts.value = posts.value.filter((p) => p.id !== id);
}

function viewPost(p) {
    alert(`Viewing post: ${p.title}`);
}

function formatDate(ts) {
    const d = new Date(ts);
    return d.toLocaleString();
}

async function signOut(){
  await router.post(('logout'));
}
</script>

<template>
    <div class="min-h-screen bg-gray-50 font-sans">
        <div class="mx-auto max-w-6xl p-6">
            <header class="mb-6 flex items-center justify-between">
                <h1 class="text-xl font-semibold">Admin Dashboard</h1>
                <div class="flex items-center gap-3">
                    <button @click="signOut" class="rounded bg-blue-600 px-3 py-1 text-sm text-white">Sign out</button>
                </div>
            </header>

            <div class="flex gap-6">
                <!-- Main -->
                <main class="flex-1 space-y-6">
                    <!-- Stats -->
                    <section class="grid grid-cols-3 gap-4">
                        <div class="rounded-lg bg-white p-4 shadow">
                            <div class="text-xs text-gray-500">Total Admins</div>
                            <div class="text-2xl font-semibold">{{ totalAdmins }}</div>
                            <div class="mt-1 text-sm text-green-600">manage access</div>
                        </div>

                        <div class="rounded-lg bg-white p-4 shadow">
                            <div class="text-xs text-gray-500">Total Users</div>
                            <div class="text-2xl font-semibold">{{ totalUsers }}</div>
                            <div class="mt-1 text-sm text-blue-600">{{ totalPosts }} posts total</div>
                        </div>

                        <div class="rounded-lg bg-white p-4 shadow">
                            <div class="text-xs text-gray-500">Total Authors</div>
                            <div class="text-2xl font-semibold">{{ totalAuthors }}</div>
                            <div class="mt-1 text-sm text-yellow-600">content creators</div>
                        </div>
                    </section>

                    <!-- Users management -->
                    <section class="space-y-4 rounded-lg bg-white p-4 shadow">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-medium">User Management</h2>
                            <div class="text-sm text-gray-500">Create, update or delete users</div>
                        </div>

                        <form @submit.prevent="createOrUpdateUser" class="grid grid-cols-1 gap-3 md:grid-cols-4">
                            <input v-model="form.name" class="rounded border p-2" placeholder="Name" required />
                            <input v-model="form.email" class="rounded border p-2" placeholder="Email" type="email" required />
                            <input v-model="form.password" class="rounded border p-2" placeholder="Password" />
                            <select v-model="form.role" class="rounded border p-2">
                                <option value="User">User</option>
                                <option value="Author">Author</option>
                                <option value="Admin">Admin</option>
                            </select>
                            <div class="flex gap-2">
                                <button type="submit" class="rounded bg-blue-600 px-3 py-2 text-white">
                                    {{ editingId === null ? 'Create' : 'Update' }}
                                </button>
                                <button type="button" @click="resetForm" v-if="editingId !== null" class="rounded bg-gray-200 px-3 py-2">
                                    Cancel
                                </button>
                            </div>
                        </form>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="text-left text-gray-500">
                                        <th class="py-2">Name</th>
                                        <th class="py-2">Email</th>
                                        <th class="py-2">Role</th>
                                        <th class="py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="u in adminsAndAuthors" :key="u.id" class="border-t">
                                        <td class="py-2">{{ u.name }}</td>
                                        <td class="py-2 text-gray-600">{{ u.email }}</td>
                                        <td class="py-2 capitalize">{{ u.role }}</td>
                                        <td class="py-2">
                                            <div class="flex gap-2">
                                                <button @click="editUser(u)" class="rounded bg-yellow-100 px-2 py-1 text-sm">Edit</button>
                                                <button @click="deleteUser(u.id)" class="rounded bg-red-100 px-2 py-1 text-sm text-red-700">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-if="users.length === 0">
                                        <td colspan="4" class="py-4 text-center text-gray-500">No users</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <!-- Recent posts -->
                    <section class="rounded-lg bg-white p-4 shadow">
                        <div class="mb-3 flex items-center justify-between">
                            <h2 class="text-lg font-medium">Recent Posts (Latest {{ recentPosts.length }})</h2>
                            <div class="text-sm text-gray-500">Total posts: {{ totalPosts }}</div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="text-left text-gray-500">
                                        <th class="py-2">Title</th>
                                        <th class="py-2">Author</th>
                                        <th class="py-2">Created</th>
                                        <th class="py-2">Status</th>
                                        <th class="py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="p in recentPosts" :key="p.id" class="border-t">
                                        <td class="py-2 font-medium">{{ p.title }}</td>
                                        <td class="py-2 text-gray-600">{{ p.author }}</td>
                                        <td class="py-2 text-gray-500">{{ formatDate(p.createdAt) }}</td>
                                        <td class="py-2">
                                            <span :class="p.approved ? 'text-green-600' : 'text-yellow-600'">
                                                {{ p.approved ? 'Approved' : 'Pending' }}
                                            </span>
                                        </td>
                                        <td class="py-2">
                                            <div class="flex gap-2">
                                                <button
                                                    v-if="!p.approved"
                                                    @click="approvePost(p.id)"
                                                    class="rounded bg-green-600 px-2 py-1 text-sm text-white"
                                                >
                                                    Approve
                                                </button>
                                                <button @click="deletePost(p.id)" class="rounded bg-red-100 px-2 py-1 text-sm text-red-700">
                                                    Delete
                                                </button>
                                                <button @click="viewPost(p)" class="rounded bg-blue-100 px-2 py-1 text-sm text-blue-700">View</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-if="recentPosts.length === 0">
                                        <td colspan="5" class="py-4 text-center text-gray-500">No posts</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</template>
