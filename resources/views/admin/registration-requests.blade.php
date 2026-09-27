<x-layouts.app>

    <div class="flex h-full w-full flex-1 flex-col gap-6">

        {{-- Header --}}
        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <div class="flex items-center gap-3">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-100 text-xl shadow-sm dark:bg-indigo-500/10">
                        📝
                    </div>

                    <div>

                        <p class="text-xs font-bold uppercase tracking-widest text-indigo-600 dark:text-indigo-400">
                            Administration
                        </p>

                        <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-3xl">
                            Registration Requests
                        </h1>

                    </div>

                </div>

                <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 dark:text-neutral-400">
                    Review account registrations and manage access to the Horizon Academy portal.
                </p>

            </div>


            {{-- Pending Counter --}}
            <div class="flex w-full items-center gap-3 rounded-2xl border border-amber-200 bg-white px-5 py-4 shadow-sm sm:w-auto dark:border-amber-500/20 dark:bg-neutral-900">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-xl dark:bg-amber-500/10">
                    ⏳
                </div>

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-neutral-500">
                        Waiting
                    </p>

                    <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                        {{ $pendingCount }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Information Banner --}}
        <div class="rounded-2xl border border-indigo-100 bg-indigo-50/70 p-5 dark:border-indigo-500/20 dark:bg-indigo-500/5">

            <div class="flex items-start gap-4">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-lg dark:bg-indigo-500/10">
                    💡
                </div>

                <div>

                    <h2 class="font-bold text-indigo-950 dark:text-indigo-300">
                        Registration management
                    </h2>

                    <p class="mt-1 text-sm leading-6 text-indigo-700 dark:text-indigo-400">
                        Review applications, approve valid accounts, move accounts back to pending, or remove registrations.
                    </p>

                </div>

            </div>

        </div>


        {{-- Status Filters --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-2 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="grid grid-cols-2 gap-2 lg:grid-cols-4">


                {{-- Pending --}}
                <a
                    href="{{ route('admin.registration-requests', ['status' => 'pending']) }}"
                    class="rounded-xl px-4 py-4 transition
                    {{ $status === 'pending'
                        ? 'bg-amber-50 text-amber-700 shadow-sm dark:bg-amber-500/10 dark:text-amber-400'
                        : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-white' }}"
                >

                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-2">
                            <span>⏳</span>

                            <span class="text-sm font-bold">
                                Pending
                            </span>
                        </div>

                        <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-bold dark:bg-neutral-800">
                            {{ $pendingCount }}
                        </span>

                    </div>

                </a>


                {{-- Approved --}}
                <a
                    href="{{ route('admin.registration-requests', ['status' => 'approved']) }}"
                    class="rounded-xl px-4 py-4 transition
                    {{ $status === 'approved'
                        ? 'bg-emerald-50 text-emerald-700 shadow-sm dark:bg-emerald-500/10 dark:text-emerald-400'
                        : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-white' }}"
                >

                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-2">
                            <span>✓</span>

                            <span class="text-sm font-bold">
                                Approved
                            </span>
                        </div>

                        <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-bold dark:bg-neutral-800">
                            {{ $approvedCount }}
                        </span>

                    </div>

                </a>


                {{-- Declined --}}
                <a
                    href="{{ route('admin.registration-requests', ['status' => 'declined']) }}"
                    class="rounded-xl px-4 py-4 transition
                    {{ $status === 'declined'
                        ? 'bg-red-50 text-red-700 shadow-sm dark:bg-red-500/10 dark:text-red-400'
                        : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-white' }}"
                >

                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-2">
                            <span>×</span>

                            <span class="text-sm font-bold">
                                Declined
                            </span>
                        </div>

                        <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-bold dark:bg-neutral-800">
                            {{ $declinedCount }}
                        </span>

                    </div>

                </a>


                {{-- All --}}
                <a
                    href="{{ route('admin.registration-requests', ['status' => 'all']) }}"
                    class="rounded-xl px-4 py-4 transition
                    {{ $status === 'all'
                        ? 'bg-indigo-50 text-indigo-700 shadow-sm dark:bg-indigo-500/10 dark:text-indigo-400'
                        : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-white' }}"
                >

                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-2">
                            <span>📋</span>

                            <span class="text-sm font-bold">
                                All
                            </span>
                        </div>

                        <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-bold dark:bg-neutral-800">
                            {{ $allCount }}
                        </span>

                    </div>

                </a>

            </div>

        </div>


        {{-- Applications --}}
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">


            {{-- Card Header --}}
            <div class="flex flex-col gap-3 border-b border-slate-200 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6 dark:border-neutral-700">

                <div>

                    <h2 class="text-lg font-bold text-slate-900 dark:text-white">

                        @if ($status === 'pending')
                            Pending Applications
                        @elseif ($status === 'approved')
                            Approved Applications
                        @elseif ($status === 'declined')
                            Declined Applications
                        @else
                            All Registrations
                        @endif

                    </h2>

                    <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">

                        {{ $requests->total() }}

                        {{ $requests->total() === 1 ? 'registration' : 'registrations' }}

                        found.

                    </p>

                </div>


                <div class="rounded-full bg-slate-100 px-4 py-2 text-xs font-bold text-slate-600 dark:bg-neutral-800 dark:text-neutral-300">

                    Page {{ $requests->currentPage() }}

                </div>

            </div>


            {{-- Responsive Table --}}
            <div class="overflow-x-auto">

                <table class="min-w-[1050px] w-full text-left">

                    <thead class="border-b border-slate-200 bg-slate-50 dark:border-neutral-700 dark:bg-neutral-800/50">

                        <tr>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-neutral-400">
                                Applicant
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-neutral-400">
                                Email
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-neutral-400">
                                Role
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-neutral-400">
                                Registered
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-neutral-400">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-neutral-400">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100 dark:divide-neutral-800">

                        @forelse ($requests as $request)

                            <tr class="transition hover:bg-slate-50 dark:hover:bg-neutral-800/40" style="border-bottom:1px solid grey;">


                                {{-- Applicant --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold uppercase text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400">
                                            {{ strtoupper(substr($request->name, 0, 1)) }}
                                        </div>

                                        <div>

                                            <p class="font-semibold text-slate-900 dark:text-white">
                                                {{ $request->name }}
                                            </p>

                                            <p class="mt-1 text-xs text-slate-400 dark:text-neutral-500">
                                                Account #{{ $request->id }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- Email --}}
                                <td class="px-6 py-5">

                                    <span class="text-sm text-slate-600 dark:text-neutral-300">
                                        {{ $request->email }}
                                    </span>

                                </td>


                                {{-- Role --}}
                                <td class="px-6 py-5">

                                    @if ($request->role === 'student')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-50 px-3 py-1.5 text-xs font-bold text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400">
                                            🎓 Student
                                        </span>

                                    @elseif ($request->role === 'teacher')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-purple-50 px-3 py-1.5 text-xs font-bold text-purple-700 dark:bg-purple-500/10 dark:text-purple-400">
                                            👨‍🏫 Teacher
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700 dark:bg-blue-500/10 dark:text-blue-400">
                                            💼 Staff
                                        </span>

                                    @endif

                                </td>


                                {{-- Registered --}}
                                <td class="px-6 py-5">

                                    <p class="text-sm font-medium text-slate-700 dark:text-neutral-300">
                                        {{ $request->created_at->format('d M Y') }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400 dark:text-neutral-500">
                                        {{ $request->created_at->format('h:i A') }}
                                    </p>

                                </td>


                                {{-- Status --}}
                                <td class="px-6 py-5">

                                    @if ($request->status === 'pending')

                                        <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700 dark:bg-amber-500/10 dark:text-amber-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Pending
                                        </span>

                                    @elseif ($request->status === 'approved')

                                        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Approved
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700 dark:bg-red-500/10 dark:text-red-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                            Declined
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-5">

                                    <div class="flex flex-wrap justify-end gap-2">


                                        {{-- Pending --}}
                                        @if ($request->status === 'pending')

                                            <form
                                                method="POST"
                                                action="{{ route('admin.registration-requests.approve', $request) }}"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                style= "margin:5px; background-color:green;"
                                                    type="button"
                                                    onclick="confirmApprove(this)"
                                                    class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-3 py-2 text-xs font-bold text-green shadow-sm transition hover:bg-emerald-700"
                                                >
                                                ✓ Approve
                                                </button>

                                            </form>


                                            <form
                                                method="POST"
                                                action="{{ route('admin.registration-requests.decline', $request) }}"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button style="background-color:red;color:white;"
                                                    type="button"
                                                    onclick="confirmDecline(this)"
                                                    class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-white px-3 py-2 text-xs font-bold text-red-600 transition hover:bg-red-50 dark:border-red-500/20 dark:bg-neutral-900 dark:text-red-400 dark:hover:bg-red-500/10"
                                                >
                                                    × Decline
                                                </button>

                                            </form>

                                        @endif


                                        {{-- Approved --}}
                                        @if ($request->status === 'approved')

                                            <form
                                                method="POST"
                                                action="{{ route('admin.registration-requests.pending', $request) }}"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="button"
                                                    onclick="confirmPending(this)"
                                                    class="inline-flex items-center gap-1.5 rounded-lg bg-amber-500 px-3 py-2 text-xs font-bold text-white transition hover:bg-amber-600"
                                                >
                                                    ↻ Pending
                                                </button>

                                            </form>

                                        @endif


                                        {{-- Declined --}}
                                        @if ($request->status === 'declined')

                                            <form
                                                method="POST"
                                                action="{{ route('admin.registration-requests.approve', $request) }}"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                style="background-color:green;"
                                                    type="button"
                                                    onclick="confirmApprove(this)"
                                                    class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-emerald-700"
                                                >
                                                    ✓ Approve
                                                </button>

                                            </form>


                                            <form
                                                method="POST"
                                                action="{{ route('admin.registration-requests.pending', $request) }}"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="button"
                                                    onclick="confirmPending(this)"
                                                    class="inline-flex items-center gap-1.5 rounded-lg bg-yellow px-3 py-2 text-xs font-bold text-white transition hover:bg-amber-600"
                                                >
                                                    ↻ Pending
                                                </button>

                                            </form>

                                        @endif


                                        {{-- Remove --}}
                                        <form
                                            method="POST"
                                            action="{{ route('admin.registration-requests.destroy', $request) }}"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                            style="margin:5px; background-color:red; color:white;"
                                                type="button"
                                                onclick="confirmRemove(this, @js($request->name))"
                                                class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-white px-3 py-2 text-xs font-bold text-red-600 transition hover:bg-red-50 dark:border-red-500/20 dark:bg-neutral-900 dark:text-red-400 dark:hover:bg-red-500/10"
                                            >
                                                🗑 Remove
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="px-6 py-16 text-center">

                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-3xl dark:bg-neutral-800">
                                        📭
                                    </div>

                                    <h3 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                                        No registrations found
                                    </h3>

                                    <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                                        There are no registrations in this category right now.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if ($requests->hasPages())

                <div class="border-t border-slate-200 bg-slate-50/50 px-5 py-4 dark:border-neutral-700 dark:bg-neutral-800/30 sm:px-6">

                    {{ $requests->links() }}

                </div>

            @endif

        </div>

    </div>


    {{-- SweetAlert --}}
    <script>

        function confirmApprove(button) {

            Swal.fire({
                title: 'Approve registration?',
                text: 'This user will be allowed to log in to the academy portal.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, approve',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#059669',
                cancelButtonColor: '#64748b',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    button.closest('form').submit();
                }

            });

        }


        function confirmDecline(button) {

            Swal.fire({
                title: 'Decline registration?',
                text: 'This user will not be allowed to log in.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, decline',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    button.closest('form').submit();
                }

            });

        }


        function confirmPending(button) {

            Swal.fire({
                title: 'Move back to pending?',
                text: 'This account will require administrator approval again.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, move to pending',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#f59e0b',
                cancelButtonColor: '#64748b',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    button.closest('form').submit();
                }

            });

        }


        function confirmRemove(button, name) {

            Swal.fire({
                title: 'Remove account?',
                text: `${name}'s account will be permanently deleted.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, remove',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    button.closest('form').submit();
                }

            });

        }


        @if (session('success'))

            Swal.fire({
                title: 'Success!',
                text: @js(session('success')),
                icon: 'success',
                confirmButtonText: 'Continue',
                confirmButtonColor: '#0f172a'
            });

        @endif


        @if (session('error'))

            Swal.fire({
                title: 'Action unavailable',
                text: @js(session('error')),
                icon: 'error',
                confirmButtonText: 'Close',
                confirmButtonColor: '#0f172a'
            });

        @endif

    </script>

</x-layouts.app>