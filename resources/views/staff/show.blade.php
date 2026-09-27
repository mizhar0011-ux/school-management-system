<x-layouts.app>

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">
                    Staff Details
                </h1>

                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                    View staff member information.
                </p>
            </div>

            <div class="flex gap-3">

                <a
                    href="{{ route('staff.index') }}"
                    class="rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-600 dark:text-zinc-300"
                >
                    ← Back
                </a>

                <a
                    href="{{ route('staff.edit', $staff) }}"
                    class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700"
                >
                    Edit Staff
                </a>

            </div>
        </div>

        {{-- Profile --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- Personal Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                    Personal Information
                </h2>

                <div class="mt-5 space-y-4">

                    <div>
                        <p class="text-sm text-zinc-500">Full Name</p>
                        <p class="font-medium text-zinc-900 dark:text-white">
                            {{ $staff->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Employee Number</p>
                        <p class="font-medium text-zinc-900 dark:text-white">
                            {{ $staff->employee_number }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Gender</p>
                        <p class="font-medium text-zinc-900 dark:text-white">
                            {{ $staff->gender ?? 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Date of Birth</p>
                        <p class="font-medium text-zinc-900 dark:text-white">
                            {{ $staff->date_of_birth?->format('d M Y') ?? 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Phone</p>
                        <p class="font-medium text-zinc-900 dark:text-white">
                            {{ $staff->phone ?? 'Not provided' }}
                        </p>
                    </div>

                </div>

            </div>

            {{-- Employment Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                    Employment Information
                </h2>

                <div class="mt-5 space-y-4">

                    <div>
                        <p class="text-sm text-zinc-500">Department</p>
                        <p class="font-medium text-zinc-900 dark:text-white">
                            {{ $staff->department ?? 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Designation</p>
                        <p class="font-medium text-zinc-900 dark:text-white">
                            {{ $staff->designation ?? 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Joining Date</p>
                        <p class="font-medium text-zinc-900 dark:text-white">
                            {{ $staff->joining_date?->format('d M Y') ?? 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Login Email</p>
                        <p class="font-medium text-zinc-900 dark:text-white">
                            {{ $staff->user?->email ?? 'No account' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

        {{-- Address --}}
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

            <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                Address
            </h2>

            <p class="mt-3 text-zinc-700 dark:text-zinc-300">
                {{ $staff->address ?? 'No address provided.' }}
            </p>

        </div>

    </div>

</x-layouts.app>