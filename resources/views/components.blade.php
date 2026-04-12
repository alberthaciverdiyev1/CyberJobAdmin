<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Components - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .text-brand { color: #ff8c00; }
        .bg-brand { background-color: #ff8c00; }
        .border-brand { border-color: #ff8c00; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-[#111827] text-gray-900 dark:text-gray-100">

<div class="container mx-auto px-6 py-12" x-data="{ openModal: false }">

    <div class="mb-10 p-4 bg-orange-500/10 border border-orange-500/20 rounded-2xl flex items-center justify-between">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-orange-500 rounded-xl shadow-lg shadow-orange-500/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <div>
                <h4 class="text-sm font-bold uppercase tracking-wider text-orange-600 dark:text-orange-400">Default Admin Access</h4>
                <div class="flex gap-4 mt-1">
                    <p class="text-sm"><strong>Mail:</strong> <code class="bg-white dark:bg-gray-800 px-2 py-0.5 rounded border border-orange-200 dark:border-orange-900/50">admin@cyberjob.az</code></p>
                    <p class="text-sm"><strong>Pass:</strong> <code class="bg-white dark:bg-gray-800 px-2 py-0.5 rounded border border-orange-200 dark:border-orange-900/50">123456</code></p>
                </div>
            </div>
        </div>
        <div class="hidden md:block">
            <span class="text-xs font-medium text-orange-500/60 italic px-4">Development mode only.</span>
        </div>
    </div>

    <div class="space-y-12 pb-20">
        <header class="border-b border-gray-200 dark:border-gray-800 pb-5">
            <h1 class="text-4xl font-black text-gray-900 dark:text-white">UI Components Library</h1>
            <p class="text-gray-500 mt-2">Ready-to-use UI elements and style variations.</p>
        </header>

        <section>
            <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
                <span class="w-1.5 h-6 bg-orange-500 rounded-full"></span> Button Variations
            </h2>
            <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 flex flex-wrap gap-4 text-white text-sm">
                <button class="px-6 py-2.5 bg-orange-500 hover:bg-orange-600 font-semibold rounded-xl transition-all shadow-lg shadow-orange-500/20 active:scale-95">Primary Action</button>
                <button class="px-6 py-2.5 bg-gray-900 dark:bg-white dark:text-black font-semibold rounded-xl transition-all active:scale-95">Invert Theme</button>
                <button class="px-6 py-2.5 border-2 border-orange-500 text-orange-500 font-semibold rounded-xl hover:bg-orange-50 dark:hover:bg-orange-900/10 transition-all">Outline View</button>
                <button class="px-6 py-2.5 bg-red-100 text-red-600 font-semibold rounded-xl hover:bg-red-200 transition-all">Destructive</button>
                <button disabled class="px-6 py-2.5 bg-gray-200 dark:bg-gray-800 text-gray-400 cursor-not-allowed rounded-xl">Disabled State</button>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
                <span class="w-1.5 h-6 bg-orange-500 rounded-full"></span> Form Elements
            </h2>
            <div class="p-8 bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm">
                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold ml-1">Username</label>
                        <input type="text" placeholder="admin" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold ml-1">Password</label>
                        <input type="password" placeholder="••••••••" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-sm font-semibold ml-1">Professional Role</label>
                        <select class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 outline-none focus:ring-2 focus:ring-orange-500">
                            <option>Full-stack Developer</option>
                            <option>Backend Developer</option>
                            <option>UI/UX Designer</option>
                        </select>
                    </div>
                </form>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
                <span class="w-1.5 h-6 bg-orange-500 rounded-full"></span> Data Table
            </h2>
            <div class="overflow-hidden bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm text-sm">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 dark:bg-gray-800/50">
                    <tr>
                        <th class="px-6 py-4 font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Project Name</th>
                        <th class="px-6 py-4 font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 font-bold text-gray-600 dark:text-gray-400 text-right uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors">
                        <td class="px-6 py-4 font-medium">Jobing.az Redesign</td>
                        <td class="px-6 py-4"><span class="text-green-500 font-medium flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span> Live
                        </span></td>
                        <td class="px-6 py-4 text-right"><button class="text-orange-500 font-bold hover:underline">Edit</button></td>
                    </tr>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors">
                        <td class="px-6 py-4 font-medium">GoldenFruit ERP</td>
                        <td class="px-6 py-4"><span class="text-orange-400 font-medium flex items-center gap-2">
                            <span class="w-2 h-2 bg-orange-400 rounded-full"></span> Development
                        </span></td>
                        <td class="px-6 py-4 text-right"><button class="text-orange-500 font-bold hover:underline">Edit</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
                <span class="w-1.5 h-6 bg-orange-500 rounded-full"></span> Overlays & Modals
            </h2>
            <div class="p-10 bg-orange-500/10 border-2 border-dashed border-orange-500/30 rounded-2xl text-center">
                <p class="mb-4 text-gray-500 font-medium">Click the button below to trigger the modal component.</p>
                <button @click="openModal = true" class="px-8 py-3 bg-orange-500 text-white font-bold rounded-xl shadow-xl hover:-translate-y-1 transition-all">
                    Open Modal
                </button>
            </div>
        </section>

        <div x-show="openModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
             x-cloak>
            <div @click.away="openModal = false" class="bg-white dark:bg-gray-900 w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden border border-gray-200 dark:border-gray-800">
                <div class="p-6 border-b border-gray-100 dark:border-gray-800 flex justify-between items-center">
                    <h3 class="text-xl font-bold">System Notification</h3>
                    <button @click="openModal = false" class="text-gray-400 hover:text-black dark:hover:text-white text-2xl transition-colors">&times;</button>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        This is a sample modal dialog. You can use this for confirmations, forms, or displaying extra data without leaving the page.
                    </p>
                    <div class="mt-8 flex justify-end gap-3">
                        <button @click="openModal = false" class="px-5 py-2 text-gray-500 font-semibold text-xs tracking-widest uppercase hover:text-gray-700">Cancel</button>
                        <button class="px-6 py-2 bg-orange-500 text-white rounded-lg font-bold shadow-lg shadow-orange-500/20">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
