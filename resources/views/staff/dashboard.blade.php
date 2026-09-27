<x-layouts.app>

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">
                    Staff Management
                </h1>

                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                    Manage school staff members and their accounts.
                </p>
            </div>

            <a
                href="{{ route('staff.create') }}"
                class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700"
            >
                + Add Staff
            </a>
        </div>

        {{-- Success message --}}
        @if (session('success'))
            <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- Staff table --}}
        <div class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">

                    <thead class="bg-zinc-50 dark:bg-zinc-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                                Name
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                                Employee No.
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                                Department
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                                Designation
                            </th>

                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-zinc-500">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">

                        @forelse ($staff as $member)

                            <tr class="transition hover:bg-zinc-50 dark:hover:bg-zinc-800">

                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="font-medium text-zinc-900 dark:text-white">
                                        {{ $member->name }}
                                    </div>

                                    <div class="text-sm text-zinc-500">
                                        {{ $member->user?->email }}
                                    </div>
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-sm text-zinc-700 dark:text-zinc-300">
                                    {{ $member->employee_number }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-sm text-zinc-700 dark:text-zinc-300">
                                    {{ $member->department ?? '—' }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-sm text-zinc-700 dark:text-zinc-300">
                                    {{ $member->designation ?? '—' }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm">

                                    <a
                                        href="{{ route('staff.show', $member) }}"
                                        class="font-medium text-blue-600 hover:text-blue-800"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('staff.edit', $member) }}"
                                        class="ml-3 font-medium text-amber-600 hover:text-amber-800"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('staff.destroy', $member) }}"
                                        method="POST"
                                        class="ml-3 inline"
                                        onsubmit="return confirm('Are you sure you want to delete this staff member?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="font-medium text-red-600 hover:text-red-800"
                                        >
                                            Delete
                                        </button>
                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">

                                    <div class="text-4xl">👥</div>

                                    <h3 class="mt-3 text-lg font-semibold text-zinc-900 dark:text-white">
                                        No staff members found
                                    </h3>

                                    <p class="mt-1 text-sm text-zinc-500">
                                        Start by adding your first staff member.
                                    </p>

                                    <a
                                        href="{{ route('staff.create') }}"
                                        class="mt-4 inline-block rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700"
                                    >
                                        Add Staff
                                    </a>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            @if ($staff->hasPages())
                <div class="border-t border-zinc-200 px-6 py-4 dark:border-zinc-700">
                    {{ $staff->links() }}
                </div>
            @endif

        </div>

    </div>

</x-layouts.app>