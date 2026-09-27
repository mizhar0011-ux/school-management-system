<x-layouts.app>

{{ auth()->user()->role }}

    <div class="flex h-full w-full flex-1 flex-col gap-6">

        {{-- Header --}}
        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">
                Administration
            </p>

            <h1 class="mt-1 text-3xl font-bold text-slate-900 dark:text-white">
                User Management
            </h1>

            <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                View, search, filter, and manage registered users.
            </p>


            {{-- Search & Filter --}}
            <form
                method="GET"
                action="{{ route('admin.users') }}"
                class="mt-6"
            >
                <div class="flex flex-col gap-3 sm:flex-row">

                    {{-- Search --}}
                    <div class="relative flex-1">

                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            placeholder="Search by name or email..."
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 pl-11 text-sm text-slate-700 shadow-sm outline-none transition
                                   placeholder:text-slate-400
                                   focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20
                                   dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200"
                        >

                        <svg
                            class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"
                            />
                        </svg>

                    </div>


                    {{-- Role Filter --}}
                    <select
                        name="role"
                        class="rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 shadow-sm outline-none transition
                               focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20
                               dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200"
                    >
                        <option value="">
                            All Roles
                        </option>

                        <option
                            value="student"
                            @selected(($role ?? '') === 'student')
                        >
                            🎓 Students
                        </option>

                        <option
                            value="admin"
                            @selected(($role ?? '') === 'admin')
                        >
                            🛡️ Administrators
                        </option>
                    </select>


                    {{-- Search Button --}}
                    <button
                        type="submit"
                        class="rounded-xl bg-slate-950 px-6 py-3 text-sm font-semibold text-white shadow-sm transition
                               hover:-translate-y-0.5 hover:bg-indigo-700
                               focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                    >
                        Search
                    </button>


                    {{-- Clear --}}
                    @if(($search ?? '') || ($role ?? ''))

                        <a
                            href="{{ route('admin.users') }}"
                            class="rounded-xl border border-slate-200 bg-white px-6 py-3 text-center text-sm font-semibold text-slate-600 shadow-sm transition
                                   hover:bg-slate-50
                                   dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300"
                        >
                            Clear
                        </a>

                    @endif

                </div>
            </form>


            {{-- Result Count --}}
            <p class="mt-5 text-sm text-slate-500 dark:text-neutral-400">

                View all registered users in the system.

                <span class="font-semibold text-slate-700 dark:text-neutral-300">
                    {{ $users->count() }}
                    {{ Str::plural('user', $users->count()) }}
                    found
                </span>

            </p>

        </div>


        {{-- Users Table --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="overflow-x-auto">

                <table class="w-full min-w-[950px] text-left">

                    {{-- Table Header --}}
                    <thead class="border-b border-slate-200 bg-slate-50 dark:border-neutral-700 dark:bg-neutral-800">

                        <tr>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                Name
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                Email
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                Role
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                Registered
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-700 dark:text-neutral-200">
                                Action
                            </th>

                        </tr>

                    </thead>


                    {{-- Table Body --}}
                    <tbody class="divide-y divide-slate-100 dark:divide-neutral-800">

                        @forelse ($users as $user)

                            <tr class="transition hover:bg-slate-50 dark:hover:bg-neutral-800/50">


                                {{-- Name --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        {{-- Initials --}}
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-100 text-sm font-bold text-slate-700 dark:bg-neutral-800 dark:text-white">
                                            {{ $user->initials() }}
                                        </div>


                                        {{-- Name --}}
                                        <span class="font-semibold text-slate-900 dark:text-white">
                                            {{ $user->name }}
                                        </span>

                                    </div>

                                </td>


                                {{-- Email --}}
                                <td class="px-6 py-4 text-sm text-slate-500 dark:text-neutral-400">
                                    {{ $user->email }}
                                </td>


                                {{-- Role Badge --}}
                                <td class="px-6 py-4">

                                    <span
                                        class="rounded-full px-3 py-1 text-xs font-semibold
                                        {{ $user->role === 'admin'
                                            ? 'bg-indigo-100 text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400'
                                            : 'bg-slate-100 text-slate-600 dark:bg-neutral-800 dark:text-neutral-300' }}"
                                    >
                                        {{ ucfirst($user->role) }}
                                    </span>

                                </td>


                                {{-- Registered --}}
                                <td class="px-6 py-4 text-sm text-slate-500 dark:text-neutral-400">
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3 whitespace-nowrap">


                                        {{-- Role Change --}}
                                        @if ($user->id === auth()->id())

                                            {{-- Current Admin --}}
                                            <div
                                                class="inline-flex h-11 w-36 items-center justify-center gap-2 rounded-xl border border-indigo-200 bg-indigo-50 px-3 text-xs font-semibold text-indigo-700 dark:border-indigo-500/20 dark:bg-indigo-500/10 dark:text-indigo-400"
                                                title="You cannot change your own administrator role"
                                            >
                                                🔒 Admin (You)
                                            </div>

                                        @else

                                            <form
                                                method="POST"
                                                action="{{ route('admin.users.role', $user) }}"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <div class="relative w-36">

                                                    <select
                                                        name="role"
                                                        onchange="confirmRoleChange(event, this)"
                                                        class="role-select w-full appearance-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 pr-10 text-sm font-semibold text-slate-700 shadow-sm outline-none transition
                                                               hover:border-indigo-300 hover:bg-white
                                                               focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20
                                                               dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200
                                                               dark:hover:border-indigo-500 dark:hover:bg-neutral-700"
                                                    >

                                                        <option
                                                            value="student"
                                                            @selected($user->role === 'student')
                                                        >
                                                            🎓 Student
                                                        </option>

                                                        <option
                                                            value="admin"
                                                            @selected($user->role === 'admin')
                                                        >
                                                            🛡️ Admin
                                                        </option>

                                                    </select>


                                                    {{-- Custom Arrow --}}
                                                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">

                                                        <svg
                                                            class="h-4 w-4 text-slate-400"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            stroke-width="2"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M19 9l-7 7-7-7"
                                                            />
                                                        </svg>

                                                    </div>

                                                </div>

                                            </form>

                                        @endif


                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.users.edit', $user) }}"
                                            class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-indigo-200 bg-indigo-50 px-4 text-xs font-semibold text-indigo-600 shadow-sm transition
                                                   hover:-translate-y-0.5 hover:border-indigo-300 hover:bg-indigo-100
                                                   focus:outline-none focus:ring-2 focus:ring-indigo-500/20
                                                   dark:border-indigo-500/20 dark:bg-indigo-500/10 dark:text-indigo-400
                                                   dark:hover:bg-indigo-500/20"
                                        >
                                            ✏️ Edit
                                        </a>


                                        {{-- Delete --}}
                                        <form
                                            method="POST"
                                            action="{{ route('admin.users.destroy', $user) }}"
                                            onsubmit="confirmDelete(event, this)"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-red-200 bg-red-50 px-4 text-xs font-semibold text-red-600 shadow-sm transition
                                                       hover:-translate-y-0.5 hover:border-red-300 hover:bg-red-100
                                                       focus:outline-none focus:ring-2 focus:ring-red-500/20
                                                       dark:border-red-500/20 dark:bg-red-500/10 dark:text-red-400
                                                       dark:hover:bg-red-500/20"
                                            >
                                                🗑️ Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>


                        @empty

                            {{-- Empty State --}}
                            <tr>

                                <td colspan="5" class="px-6 py-16">

                                    <div class="flex flex-col items-center justify-center text-center">

                                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-3xl dark:bg-neutral-800">
                                            🔍
                                        </div>


                                        <h3 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                                            No users found
                                        </h3>


                                        <p class="mt-2 max-w-md text-sm text-slate-500 dark:text-neutral-400">
                                            We couldn't find any users matching your current search or filter.
                                        </p>


                                        @if(($search ?? '') || ($role ?? ''))

                                            <a
                                                href="{{ route('admin.users') }}"
                                                class="mt-5 rounded-xl bg-slate-950 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition
                                                       hover:-translate-y-0.5 hover:bg-indigo-700
                                                       focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                                            >
                                                Clear Filters
                                            </a>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>


                {{-- Pagination --}}
                <div class="border-t border-slate-200 px-6 py-4 dark:border-neutral-700">

                    {{ $users->links() }}

                </div>

            </div>

        </div>

    </div>


    {{-- Role Change Confirmation --}}
    <script>

        function confirmRoleChange(event, select) {

            event.preventDefault();

            const form = select.form;

            const newRole = select.value;

            const row = select.closest('tr');

            const userName = row
                .querySelector('.font-semibold')
                ?.textContent
                .trim();


            Swal.fire({

                title: 'Change User Role?',

                text: `Are you sure you want to change ${userName}'s role to ${newRole}?`,

                icon: 'warning',

                showCancelButton: true,

                confirmButtonText: 'Yes, change role',

                cancelButtonText: 'Cancel',

                confirmButtonColor: '#4f46e5',

                cancelButtonColor: '#64748b',

                reverseButtons: true,

                focusCancel: true

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                } else {

                    window.location.reload();

                }

            });

        }


        // Delete Confirmation
        function confirmDelete(event, form) {

            event.preventDefault();

            const row = form.closest('tr');

            const userName = row
                .querySelector('.font-semibold')
                ?.textContent
                .trim();


            Swal.fire({

                title: 'Delete User?',

                text: `Are you sure you want to delete ${userName}? This action cannot be undone.`,

                icon: 'warning',

                showCancelButton: true,

                confirmButtonText: 'Yes, Delete User',

                cancelButtonText: 'Cancel',

                confirmButtonColor: '#dc2626',

                cancelButtonColor: '#64748b',

                reverseButtons: true,

                focusCancel: true

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                }

            });

        }

    </script>


    {{-- Success Alert --}}
    @if (session('success'))

        <script>

            window.addEventListener('livewire:navigated', function () {

                Swal.fire({

                    title: 'Success! 🎉',

                    text: @js(session('success')),

                    icon: 'success',

                    confirmButtonText: 'Great!',

                    confirmButtonColor: '#4f46e5',

                    timer: 2500,

                    timerProgressBar: true

                });

            }, { once: true });

        </script>

    @endif


    {{-- Error Alert --}}
    @if (session('error'))

        <script>

            window.addEventListener('livewire:navigated', function () {

                Swal.fire({

                    title: 'Action Not Allowed',

                    text: @js(session('error')),

                    icon: 'error',

                    confirmButtonText: 'Okay',

                    confirmButtonColor: '#dc2626'

                });

            }, { once: true });

        </script>

    @endif


</x-layouts.app>