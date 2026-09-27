<x-layouts.app>

    <div class="flex h-full w-full flex-1 flex-col gap-6">

        {{-- Header --}}
        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">
                Administration
            </p>

            <h1 class="mt-1 text-3xl font-bold text-slate-900 dark:text-white">
                Admin Dashboard
            </h1>

            <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                Manage and monitor your Horizon Academy system.
            </p>
        </div>


        {{-- Statistics --}}
        <div class="grid gap-4 md:grid-cols-3">

            {{-- Total Users --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-neutral-400">
                            Total Users
                        </p>

                        <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">
                            {{ $totalUsers }}
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-xl dark:bg-indigo-500/10">
                        👥
                    </div>

                </div>
            </div>


            {{-- Students --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-neutral-400">
                            Students
                        </p>

                        <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">
                            {{ $totalStudents }}
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-xl dark:bg-blue-500/10">
                        🎓
                    </div>

                </div>
            </div>


            {{-- Administrators --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-neutral-400">
                            Administrators
                        </p>

                        <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">
                            {{ $totalAdmins }}
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-xl dark:bg-emerald-500/10">
                        🛡️
                    </div>

                </div>
            </div>

        </div>


        {{-- User Management --}}
        <div class="flex flex-col gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <div class="flex items-center gap-3">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-100 text-xl dark:bg-indigo-500/10">
                        👥
                    </div>

                    <h2 class="font-bold text-slate-900 dark:text-white">
                        User Management
                    </h2>

                </div>

                <p class="mt-3 text-sm text-slate-500 dark:text-neutral-400">
                    View, search, filter, change roles, and manage registered users.
                </p>
            </div>


            <a style="margin:20px;"
                href="{{ route('admin.users') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
            >
                Manage Users
                <span aria-hidden="true">→</span>
            </a>

        </div>


        {{-- Recent Users --}}
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="border-b border-slate-200 px-6 py-5 dark:border-neutral-700">

                <h2 class="font-bold text-slate-900 dark:text-white">
                    Recent Users
                </h2>

                <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                    The five most recently registered accounts.
                </p>

            </div>


            <div class="divide-y divide-slate-100 dark:divide-neutral-800">

                @forelse ($recentUsers as $user)

                    <div class="flex items-center justify-between px-6 py-4">

                        <div class="flex items-center gap-3">

                            {{-- Initials --}}
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-sm font-bold text-slate-700 dark:bg-neutral-800 dark:text-white">
                                {{ $user->initials() }}
                            </div>


                            {{-- User Information --}}
                            <div>

                                <p class="font-semibold text-slate-900 dark:text-white">
                                    {{ $user->name }}
                                </p>

                                <p class="text-sm text-slate-500 dark:text-neutral-400">
                                    {{ $user->email }}
                                </p>

                                <p class="mt-1 text-xs text-slate-400 dark:text-neutral-500">
                                    Registered {{ $user->created_at->format('M d, Y') }}
                                </p>

                            </div>

                        </div>


                        {{-- Role Badge --}}
                        <span
                            class="rounded-full px-3 py-1 text-xs font-semibold
                            {{ $user->role === 'admin'
                                ? 'bg-indigo-100 text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400'
                                : 'bg-slate-100 text-slate-600 dark:bg-neutral-800 dark:text-neutral-300' }}"
                        >
                            {{ ucfirst($user->role) }}
                        </span>

                    </div>

                @empty

                    <div class="px-6 py-8 text-center text-sm text-slate-500 dark:text-neutral-400">
                        No users found.
                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-layouts.app>