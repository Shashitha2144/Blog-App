<template>
    <div class="min-h-screen bg-gray-50 font-sans">
        <div class="max-w-6xl mx-auto p-6">
            <header class="flex items-center justify-between mb-6">
                <h1 class="text-xl font-semibold">Admin Dashboard</h1>
                <div class="flex items-center gap-3">
                    <button class="px-3 py-1 rounded bg-blue-600 text-white text-sm">Sign out</button>
                </div>
            </header>

            <div class="flex gap-6">
               
               

                <!-- Main -->
                <main class="flex-1 space-y-6">
                    <!-- Stats -->
                    <section class="grid grid-cols-3 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="text-xs text-gray-500">Total Admins</div>
                            <div class="text-2xl font-semibold">{{ totalAdmins }}</div>
                            <div class="text-sm text-green-600 mt-1">manage access</div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="text-xs text-gray-500">Total Users</div>
                            <div class="text-2xl font-semibold">{{ totalUsers }}</div>
                            <div class="text-sm text-blue-600 mt-1">{{ totalPosts }} posts total</div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="text-xs text-gray-500">Total Authors</div>
                            <div class="text-2xl font-semibold">{{ totalAuthors }}</div>
                            <div class="text-sm text-yellow-600 mt-1">content creators</div>
                        </div>
                    </section>

                    <!-- Users management -->
                    <section class="bg-white p-4 rounded-lg shadow space-y-4">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-medium">User Management</h2>
                            <div class="text-sm text-gray-500">Create, update or delete users</div>
                        </div>

                        <form @submit.prevent="createOrUpdateUser" class="grid grid-cols-1 md:grid-cols-4 gap-3">
                            <input v-model="form.name" class="p-2 border rounded" placeholder="Name" required />
                            <input v-model="form.email" class="p-2 border rounded" placeholder="Email" type="email" required />
                            <select v-model="form.role" class="p-2 border rounded">
                                <option value="user">User</option>
                                <option value="author">Author</option>
                                <option value="admin">Admin</option>
                            </select>
                            <div class="flex gap-2">
                                <button type="submit" class="px-3 py-2 bg-blue-600 text-white rounded">
                                    {{ editingId === null ? 'Create' : 'Update' }}
                                </button>
                                <button type="button" @click="resetForm" v-if="editingId !== null" class="px-3 py-2 bg-gray-200 rounded">Cancel</button>
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
                                    <tr v-for="u in users" :key="u.id" class="border-t">
                                        <td class="py-2">{{ u.name }}</td>
                                        <td class="py-2 text-gray-600">{{ u.email }}</td>
                                        <td class="py-2 capitalize">{{ u.role }}</td>
                                        <td class="py-2">
                                            <div class="flex gap-2">
                                                <button @click="editUser(u)" class="px-2 py-1 text-sm bg-yellow-100 rounded">Edit</button>
                                                <button @click="deleteUser(u.id)" class="px-2 py-1 text-sm bg-red-100 text-red-700 rounded">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-if="users.length === 0"><td colspan="4" class="py-4 text-center text-gray-500">No users</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <!-- Recent posts -->
                    <section class="bg-white p-4 rounded-lg shadow">
                        <div class="flex items-center justify-between mb-3">
                            <h2 class="text-lg font-medium">Recent Posts (Latest 10)</h2>
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
                                                <button v-if="!p.approved" @click="approvePost(p.id)" class="px-2 py-1 bg-green-600 text-white text-sm rounded">Approve</button>
                                                <button @click="deletePost(p.id)" class="px-2 py-1 bg-red-100 text-red-700 text-sm rounded">Delete</button>
                                                <button @click="viewPost(p)" class="px-2 py-1 bg-blue-100 text-blue-700 text-sm rounded">View</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-if="recentPosts.length === 0"><td colspan="5" class="py-4 text-center text-gray-500">No posts</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref, computed } from 'vue'

/*
    Mock data and simple local operations.
    Replace with real API calls in your app.
*/

const users = ref([
    { id: 1, name: 'Jane Doe', email: 'jane@example.com', role: 'admin' },
    { id: 2, name: 'Mike Lee', email: 'mike@example.com', role: 'author' },
    { id: 3, name: 'Alice Smith', email: 'alice@example.com', role: 'user' },
])

const posts = ref([
    { id: 101, title: 'Welcome to the blog', author: 'Jane Doe', createdAt: Date.now() - 3600 * 1000 * 2, approved: true },
    { id: 102, title: 'How to use Tailwind', author: 'Mike Lee', createdAt: Date.now() - 3600 * 1000 * 6, approved: false },
    { id: 103, title: 'Scheduled backup', author: 'System', createdAt: Date.now() - 3600 * 24 * 1000, approved: true },
    // ... more mock posts
])

// populate to have >10 for demo
for (let i = 0; i < 12; i++) {
    posts.value.push({
        id: 200 + i,
        title: `Sample post #${i + 1}`,
        author: i % 2 === 0 ? 'Alice Smith' : 'Mike Lee',
        createdAt: Date.now() - (i + 1) * 3600 * 1000,
        approved: i % 3 === 0,
    })
}

const form = reactive({ name: '', email: '', role: 'user' })
const editingId = ref(null)

const totalAdmins = computed(() => users.value.filter(u => u.role === 'admin').length)
const totalAuthors = computed(() => users.value.filter(u => u.role === 'author').length)
const totalUsers = computed(() => users.value.filter(u => u.role === 'user').length + totalAuthors.value + totalAdmins.value) // all users
const totalPosts = computed(() => posts.value.length)

const recentPosts = computed(() => {
    // assume posts are in reverse chronological order; sort just in case
    return [...posts.value].sort((a, b) => b.createdAt - a.createdAt).slice(0, 10)
})

function resetForm() {
    editingId.value = null
    form.name = ''
    form.email = ''
    form.role = 'user'
}

function createOrUpdateUser() {
    if (!form.name || !form.email) return
    if (editingId.value === null) {
        const id = Date.now()
        users.value.push({ id, name: form.name, email: form.email, role: form.role })
    } else {
        const idx = users.value.findIndex(u => u.id === editingId.value)
        if (idx !== -1) {
            users.value[idx] = { ...users.value[idx], name: form.name, email: form.email, role: form.role }
        }
    }
    resetForm()
}

function editUser(u) {
    editingId.value = u.id
    form.name = u.name
    form.email = u.email
    form.role = u.role
}

function deleteUser(id) {
    if (!confirm('Delete user?')) return
    users.value = users.value.filter(u => u.id !== id)
    if (editingId.value === id) resetForm()
}

function approvePost(id) {
    const p = posts.value.find(x => x.id === id)
    if (p) p.approved = true
}

function deletePost(id) {
    if (!confirm('Delete post?')) return
    posts.value = posts.value.filter(p => p.id !== id)
}

function viewPost(p) {
    alert(`Viewing post: ${p.title}`)
}

function formatDate(ts) {
    const d = new Date(ts)
    return d.toLocaleString()
}
</script>
