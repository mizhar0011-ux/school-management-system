<x-layouts.app>

    <div class="flex h-full w-full flex-1 flex-col gap-4">

        {{-- Welcome Header --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400">
                Horizon Academy
            </p>

            <h1 class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                Welcome, {{ auth()->user()->name }}! 👋
            </h1>

            <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                Welcome to your Student Management Portal.
            </p>

        </div>


        {{-- Dashboard Cards --}}
        <div class="grid gap-4 md:grid-cols-3">

            @php
                $student = auth()->user()->student;

                $profileComplete = $student
                    && filled($student->name)
                    && filled($student->gender)
                    && filled($student->date_of_birth)
                    && filled($student->phone)
                    && filled($student->guardian_name)
                    && filled($student->guardian_phone)
                    && filled($student->class_name)
                    && filled($student->section)
                    && filled($student->address);
            @endphp


            {{-- Student Profile --}}
            <a
                href="{{ route('student.profile') }}"
                class="block rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md dark:border-neutral-700 dark:bg-neutral-900"
                wire:navigate
            >

                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-100 text-xl dark:bg-indigo-500/10">
                    🎓
                </div>

                <h2 class="font-semibold text-slate-900 dark:text-white">
                    Student Profile
                </h2>

                <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                    Manage your personal information and account details.
                </p>


                {{-- Profile Status --}}
                <div class="mt-4">

                    @if ($profileComplete)

                        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400">

                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                            Profile Complete

                        </span>

                    @else

                        <span class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700 dark:bg-amber-500/10 dark:text-amber-400">

                            <span class="h-2 w-2 rounded-full bg-amber-500"></span>

                            Profile Incomplete

                        </span>

                    @endif

                </div>


                {{-- Profile Action --}}
                <div class="mt-4 text-sm font-semibold text-indigo-600 dark:text-indigo-400">

                    {{ $profileComplete ? 'View Profile →' : 'Complete Profile →' }}

                </div>

            </a>


            {{-- Academic Records --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-xl dark:bg-blue-500/10">
                    📚
                </div>

                <h2 class="font-semibold text-slate-900 dark:text-white">
                    Academic Records
                </h2>

                <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                    Your courses, subjects and academic information.
                </p>

            </div>


            {{-- Account Security --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-xl dark:bg-emerald-500/10">
                    🔐
                </div>

                <h2 class="font-semibold text-slate-900 dark:text-white">
                    Account Security
                </h2>

                <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                    Keep your account secure and manage your password.
                </p>

            </div>

        </div>


        {{-- Profile Completion Notice --}}
        @if (! $profileComplete)

            <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 dark:border-amber-900/50 dark:bg-amber-950/20">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h2 class="font-semibold text-amber-900 dark:text-amber-300">
                            Complete your student profile
                        </h2>

                        <p class="mt-1 text-sm text-amber-700 dark:text-amber-400">
                            Your profile is incomplete. Please provide the remaining information to complete your student record.
                        </p>

                    </div>

                    <a
                        href="{{ route('student.profile') }}"
                        class="inline-flex shrink-0 items-center justify-center rounded-xl bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-700"
                        wire:navigate
                    >
                        Complete Profile
                    </a>

                </div>

            </div>

        @else

            <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5 dark:border-emerald-900/50 dark:bg-emerald-950/20">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 dark:bg-emerald-500/10">
                        ✓
                    </div>

                    <div>

                        <h2 class="font-semibold text-emerald-900 dark:text-emerald-300">
                            Profile Complete
                        </h2>

                        <p class="mt-1 text-sm text-emerald-700 dark:text-emerald-400">
                            Your student profile contains all required information.
                        </p>

                    </div>

                </div>

            </div>

        @endif


        {{-- Portal Information --}}
        <div class="flex-1 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                Student Portal
            </h2>

            <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                More academic and student management features will appear here
                as we build the system.
            </p>

        </div>

    </div>


    {{-- Registration Success Alert --}}
    @if (session('success'))

        <script>
            window.addEventListener('livewire:navigated', function () {

                Swal.fire({
                    title: 'Welcome to Horizon Academy! 🎓',
                    text: @js(session('success')),
                    icon: 'success',
                    confirmButtonText: 'Continue',
                    confirmButtonColor: '#0f172a'
                });

            }, { once: true });
        </script>

    @endif

</x-layouts.app>
