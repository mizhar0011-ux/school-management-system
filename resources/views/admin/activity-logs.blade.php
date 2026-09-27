<x-layouts.app>

    <div class="flex h-full w-full flex-1 flex-col gap-6">

        {{-- Header --}}
        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">
                Administration
            </p>

            <h1 class="mt-1 text-3xl font-bold text-slate-900 dark:text-white">
                Activity Log
            </h1>

            <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                Track important actions performed by administrators.
            </p>
        </div>

        {{-- Activity Table --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="overflow-x-auto">
                <table class="w-full min-w-[900px] text-left">

                    <thead class="border-b border-slate-200 bg-slate-50 dark:border-neutral-700 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                Admin
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                Action
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                User
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                Description
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                Date
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 dark:divide-neutral-800">

                        @forelse ($logs as $log)

                            <tr class="transition hover:bg-slate-50 dark:hover:bg-neutral-800/50">

                                {{-- Admin --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400">
                                            {{ $log->admin?->initials() ?? '?' }}
                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-900 dark:text-white">
                                                {{ $log->admin?->name ?? 'Unknown Admin' }}
                                            </p>

                                            <p class="text-xs text-slate-400">
                                                Administrator
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-4">
                                    <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400">
                                        {{ ucwords(str_replace('_', ' ', $log->action)) }}
                                    </span>
                                </td>

                                {{-- Affected User --}}
                                <td class="px-6 py-4">

                                    @if ($log->user)

                                        <div>
                                            <p class="font-semibold text-slate-900 dark:text-white">
                                                {{ $log->user->name }}
                                            </p>

                                            <p class="text-xs text-slate-400">
                                                {{ $log->user->email }}
                                            </p>
                                        </div>

                                    @else

                                        <span class="text-sm text-slate-400">
                                            User removed
                                        </span>

                                    @endif

                                </td>

                                {{-- Description --}}
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-neutral-300">
                                    {{ $log->description }}
                                </td>

                                {{-- Date --}}
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <p class="text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                        {{ $log->created_at->format('M d, Y') }}
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        {{ $log->created_at->format('h:i A') }}
                                    </p>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-6 py-16">

                                    <div class="flex flex-col items-center justify-center text-center">

                                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-3xl dark:bg-neutral-800">
                                            📋
                                        </div>

                                        <h3 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                                            No activity yet
                                        </h3>

                                        <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                                            Administrator activity will appear here.
                                        </p>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

            {{-- Pagination --}}
            @if ($logs->hasPages())
                <div class="border-t border-slate-200 px-6 py-4 dark:border-neutral-700">
                    {{ $logs->links() }}
                </div>
            @endif

        </div>

    </div>

</x-layouts.app>