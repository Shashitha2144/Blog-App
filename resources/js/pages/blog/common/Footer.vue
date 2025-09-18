<template>
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between py-6">
                <div class="flex items-center space-x-3">
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Blog App</span>
                    <p class="text-sm text-gray-500 dark:text-gray-400">A simple Tailwind footer</p>
                </div>

                <div class="mt-4 md:mt-0 flex items-center space-x-6">
                    <nav class="flex space-x-4">
                        <a href="#" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">About</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Privacy</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Contact</a>
                    </nav>
                </div>
            </div>

            <div class="pt-4 pb-6 border-t border-gray-100 dark:border-gray-800 text-center">
                <p class="text-xs text-gray-500 dark:text-gray-400">© {{ year }} Blog App. All rights reserved.</p>
            </div>
        </div>
    </footer>
</template>

<script setup>
const year = new Date().getFullYear()
</script>