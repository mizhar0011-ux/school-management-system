<x-layouts.app :title="__('Teacher Details')">

    <div class="mx-auto max-w-5xl space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">

            <div>
                <flux:heading size="xl">
                    Teacher Details
                </flux:heading>

                <flux:text class="mt-1">
                    View complete teacher information.
                </flux:text>
            </div>

            <div class="flex gap-2">

                <flux:button
                    :href="route('teachers.index')"
                    wire:navigate
                >
                    Back to Teachers
                </flux:button>

                <flux:button
                    variant="primary"
                    :href="route('teachers.edit', $teacher)"
                    wire:navigate
                >
                    Edit Teacher
                </flux:button>

            </div>

        </div>

        {{-- Teacher Header Card --}}
        <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

                <div class="flex h-20 w-20 items-center justify-center rounded-full bg-indigo-100 text-2xl font-bold text-indigo-700 dark:bg-indigo-500/20 dark:text-indigo-400">
                    {{ $teacher->user?->initials() ?? collect(explode(' ', $teacher->name))
                        ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
                        ->take(2)
                        ->implode('') }}
                </div>

                <div class="flex-1">

                    <flux:heading size="lg">
                        {{ $teacher->name }}
                    </flux:heading>

                    <flux:text class="mt-1">
                        Employee No: {{ $teacher->employee_number }}
                    </flux:text>

                    @if ($teacher->user)
                        <flux:text class="mt-1">
                            {{ $teacher->user->email }}
                        </flux:text>
                    @endif

                </div>

                @if ($teacher->user)

                    @if ($teacher->user->status === 'approved')

                        <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700 dark:bg-green-500/10 dark:text-green-400">
                            Approved
                        </span>

                    @elseif ($teacher->user->status === 'pending')

                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700 dark:bg-yellow-500/10 dark:text-yellow-400">
                            Pending
                        </span>

                    @else

                        <span class="rounded-full bg-red-100 px-3 py-1 text-sm font-semibold text-red-700 dark:bg-red-500/10 dark:text-red-400">
                            Declined
                        </span>

                    @endif

                @endif

            </div>

        </div>

        {{-- Personal Information --}}
        <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">

            <flux:heading size="lg">
                Personal Information
            </flux:heading>

            <div class="mt-6 grid gap-6 md:grid-cols-2">

                <div>
                    <div class="text-sm text-zinc-500">
                        Full Name
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->name }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-zinc-500">
                        Gender
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->gender ?? 'Not provided' }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-zinc-500">
                        Date of Birth
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->date_of_birth?->format('d M Y') ?? 'Not provided' }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-zinc-500">
                        Phone
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->phone ?? 'Not provided' }}
                    </div>
                </div>

                <div class="md:col-span-2">
                    <div class="text-sm text-zinc-500">
                        Address
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->address ?? 'Not provided' }}
                    </div>
                </div>

            </div>

        </div>

        {{-- Professional Information --}}
        <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">

            <flux:heading size="lg">
                Professional Information
            </flux:heading>

            <div class="mt-6 grid gap-6 md:grid-cols-2">

                <div>
                    <div class="text-sm text-zinc-500">
                        Employee Number
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->employee_number }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-zinc-500">
                        Qualification
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->qualification ?? 'Not provided' }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-zinc-500">
                        Subject
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->subject ?? 'Not assigned' }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-zinc-500">
                        Joining Date
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->joining_date?->format('d M Y') ?? 'Not provided' }}
                    </div>
                </div>

            </div>

        </div>

        {{-- Account Information --}}
        <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">

            <flux:heading size="lg">
                Login Account
            </flux:heading>

            <div class="mt-6 grid gap-6 md:grid-cols-2">

                <div>
                    <div class="text-sm text-zinc-500">
                        Email
                    </div>

                    <div class="mt-1 font-medium">
                        {{ $teacher->user?->email ?? 'No account' }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-zinc-500">
                        Role
                    </div>

                    <div class="mt-1 font-medium capitalize">
                        {{ $teacher->user?->role ?? 'No account' }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-zinc-500">
                        Account Status
                    </div>

                    <div class="mt-1 font-medium capitalize">
                        {{ $teacher->user?->status ?? 'No account' }}
                    </div>
                </div>

            </div>

        </div>

    </div>

</x-layouts.app>