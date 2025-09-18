<template>
    <aside
        class="flex flex-col bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 h-screen transition-all duration-200 ease-in-out"
        :class="sidebarWidthClass"
        role="complementary"
        aria-label="Main Sidebar"
    >
        <!-- Header -->
        <div class="flex items-center px-3 py-4 border-b border-gray-100 dark:border-gray-700">
            <button
                @click="toggle"
                @keydown.space.prevent="toggle"
                @keydown.enter.prevent="toggle"
                :aria-pressed="collapsed"
                :aria-label="collapsed ? 'Expand sidebar' : 'Collapse sidebar'"
                class="flex items-center gap-2 text-sm font-medium text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded p-1"
            >
                <svg
                    class="w-6 h-6 text-indigo-600 dark:text-indigo-400"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M3 12h18"></path>
                    <path d="M3 6h18"></path>
                    <path d="M3 18h18"></path>
                </svg>

                <span
                    class="whitespace-nowrap transition-opacity duration-200"
                    :class="collapsed ? 'opacity-0 pointer-events-none' : 'opacity-100'"
                >
                    Blog
                </span>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="px-2 space-y-1">
                <li v-for="item in items" :key="item.name">
                    <a
                        href="#"
                        class="group flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                        :title="collapsed ? item.name : ''"
                        @click.prevent="select(item)"
                        :aria-current="item.current ? 'page' : undefined"
                    >
                        <span
                            class="flex-none w-6 h-6 rounded-md flex items-center justify-center text-indigo-600 dark:text-indigo-300"
                            v-html="item.icon"
                        ></span>

                        <span
                            class="truncate transition-all duration-150"
                            :class="collapsed ? 'opacity-0 w-0 overflow-hidden' : 'opacity-100 w-auto'"
                        >
                            {{ item.name }}
                        </span>

                        <span v-if="item.badge && !collapsed" class="ml-auto text-xs bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full">
                            {{ item.badge }}
                        </span>
                    </a>
                </li>
            </ul>
        </nav>


    </aside>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue'

const STORAGE_KEY = 'sidebar-collapsed-v1'
const collapsed = ref(false)

onMounted(() => {
    try {
        const raw = localStorage.getItem(STORAGE_KEY)
        collapsed.value = raw === 'true'
    } catch (e) {
        collapsed.value = false
    }
})

watch(collapsed, (val) => {
    try {
        localStorage.setItem(STORAGE_KEY, String(val))
    } catch (e) {
        // ignore
    }
})

function toggle() {
    collapsed.value = !collapsed.value
}

function select(item) {
    // placeholder for navigation
    // emit or router push in real app
    console.log('selected', item.name)
}

const sidebarWidthClass = computed(() => (collapsed.value ? 'w-16' : 'w-64'))

const items = [
    {
        name: 'Dashboard',
        icon:
            '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 13h8V3H3v10zM13 21h8V11h-8v10zM13 3v8h8V3h-8zM3 21h8v-8H3v8z"></path></svg>',
        current: true,
    },
    {
        name: 'Posts',
        icon:
            '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 21H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2z"></path></svg>',
        badge: 5,
    },
    {
        name: 'Tags',
        icon:
            '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 13.19L11 3.34a2.5 2.5 0 0 0-3.54 0L1.34 9.45a2.5 2.5 0 0 0 0 3.54l9.84 9.85a2.5 2.5 0 0 0 3.54 0l6.12-6.12a2.5 2.5 0 0 0 0-3.54z"></path></svg>',
    },
    {
        name: 'Settings',
        icon:
            '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 15.5A3.5 3.5 0 1 0 12 8.5a3.5 3.5 0 0 0 0 7z"></path><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06A2 2 0 0 1 2.3 17.9l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09c.68 0 1.28-.4 1.51-1a1.65 1.65 0 0 0-.33-1.82L4.3 4.7A2 2 0 0 1 7.12 1.88l.06.06c.45.45 1.1.6 1.72.43.56-.15 1.18-.23 1.82-.23h.18c.64 0 1.26.08 1.82.23.62.17 1.27.02 1.72-.43l.06-.06A2 2 0 0 1 19.7 4.3l-.06.06c-.45.45-.6 1.1-.43 1.72.15.56.23 1.18.23 1.82v.18c0 .64-.08 1.26-.23 1.82-.17.62-.02 1.27.43 1.72l.06.06z"></path></svg>',
    },
]
</script>

<style scoped>
/* Smooth width transitions via transition-all on the root element.
     Keep scoped styles minimal; all heavy lifting is with Tailwind. */
aside {
    transition-property: width, background-color, border-color;
}
</style>