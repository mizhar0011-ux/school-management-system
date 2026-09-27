<x-layouts.app>

@php
    $profileComplete = $teacher
        && filled($teacher->name)
        && filled($teacher->gender)
        && filled($teacher->date_of_birth)
        && filled($teacher->phone)
        && filled($teacher->address)
        && filled($teacher->subject)
        && filled($teacher->qualification)
        && filled($teacher->joining_date);
@endphp

<div
    id="teacher-dashboard"
    class="min-h-screen bg-zinc-50 px-4 py-6 dark:bg-zinc-950 sm:px-6 lg:px-8"
>
    <div class="mx-auto max-w-7xl space-y-6">

        {{-- =====================================================
             WELCOME HEADER
        ====================================================== --}}
        <div
            class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-600 via-violet-600 to-purple-700 p-6 shadow-xl sm:p-8"
        >

            {{-- Decorative Background --}}
            <div
                class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-white/10"
            ></div>

            <div
                class="absolute -bottom-20 -left-10 h-56 w-56 rounded-full bg-white/5"
            ></div>

            <div
                class="relative flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between"
            >

                <div class="teacher-fade-in">

                    <div class="mb-3 flex items-center gap-2 text-indigo-100">

                        <span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10"
                        >
                            <flux:icon
                                name="academic-cap"
                                class="!h-5 !w-5"
                            />
                        </span>

                        <span class="text-sm font-medium">
                            Teacher Portal
                        </span>

                    </div>

                    <h1
                        class="text-2xl font-bold tracking-tight text-white sm:text-3xl lg:text-4xl"
                    >
                        Welcome, {{ $teacher->name }}! 👋
                    </h1>

                    <p
                        class="mt-2 max-w-xl text-sm leading-6 text-indigo-100 sm:text-base"
                    >
                        Manage your teacher profile and keep your professional
                        information up to date.
                    </p>

                </div>


                {{-- Teacher Avatar --}}
                <div class="flex shrink-0 items-center justify-center">

                    <div
                        class="teacher-avatar flex h-20 w-20 items-center justify-center rounded-2xl border border-white/20 bg-white/10 text-2xl font-bold text-white shadow-lg backdrop-blur-sm sm:h-24 sm:w-24"
                    >
                        {{ strtoupper(substr($teacher->name, 0, 1)) }}
                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             QUICK STATS
        ====================================================== --}}
        <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3"
        >

            {{-- Employee Number --}}
            <div
                class="teacher-card teacher-delay-1 group rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
            >

                <div class="flex items-start justify-between gap-4">

                    <div class="min-w-0">

                        <p
                            class="text-sm font-medium text-zinc-500 dark:text-zinc-400"
                        >
                            Employee Number
                        </p>

                        <p
                            class="mt-2 truncate text-xl font-bold text-zinc-900 dark:text-white"
                        >
                            {{ $teacher->employee_number }}
                        </p>

                    </div>

                    <span
                        class="teacher-icon flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-400"
                    >
                        <flux:icon
                            name="identification"
                            class="!h-5 !w-5"
                        />
                    </span>

                </div>

                <div
                    class="mt-4 h-1 overflow-hidden rounded-full bg-zinc-100 dark:bg-zinc-800"
                >
                    <div
                        class="teacher-progress h-full w-full rounded-full bg-indigo-500"
                    ></div>
                </div>

            </div>


            {{-- Subject --}}
            <div
                class="teacher-card teacher-delay-2 group rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
            >

                <div class="flex items-start justify-between gap-4">

                    <div class="min-w-0">

                        <p
                            class="text-sm font-medium text-zinc-500 dark:text-zinc-400"
                        >
                            Teaching Subject
                        </p>

                        <p
                            class="mt-2 truncate text-xl font-bold text-zinc-900 dark:text-white"
                        >
                            {{ $teacher->subject ?? 'Not specified' }}
                        </p>

                    </div>

                    <span
                        class="teacher-icon flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400"
                    >
                        <flux:icon
                            name="book-open"
                            class="!h-5 !w-5"
                        />
                    </span>

                </div>

                <p
                    class="mt-4 text-xs text-zinc-500 dark:text-zinc-400"
                >
                    Professional information
                </p>

            </div>


            {{-- Qualification --}}
            <div
                class="teacher-card teacher-delay-3 group rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
            >

                <div class="flex items-start justify-between gap-4">

                    <div class="min-w-0">

                        <p
                            class="text-sm font-medium text-zinc-500 dark:text-zinc-400"
                        >
                            Qualification
                        </p>

                        <p
                            class="mt-2 truncate text-xl font-bold text-zinc-900 dark:text-white"
                        >
                            {{ $teacher->qualification ?? 'Not specified' }}
                        </p>

                    </div>

                    <span
                        class="teacher-icon flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400"
                    >
                        <flux:icon
                            name="academic-cap"
                            class="!h-5 !w-5"
                        />
                    </span>

                </div>

                <p
                    class="mt-4 text-xs text-zinc-500 dark:text-zinc-400"
                >
                    Academic qualification
                </p>

            </div>

        </div>

        {{-- =====================================================
     PROFILE COMPLETION STATUS
====================================================== --}}
@if (! $profileComplete)

    <div
        class="teacher-card overflow-hidden rounded-2xl border border-amber-200 bg-amber-50 p-5 dark:border-amber-900/50 dark:bg-amber-950/20"
    >

        <div
            class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
        >

            <div>

                <h2 class="font-semibold text-amber-900 dark:text-amber-300">
                    Complete your teacher profile
                </h2>

                <p class="mt-1 text-sm text-amber-700 dark:text-amber-400">
                    Your profile is incomplete. Please provide the remaining
                    information to complete your teacher record.
                </p>

            </div>

            <a
                href="{{ route('teacher.profile') }}"
                wire:navigate
                class="inline-flex shrink-0 items-center justify-center rounded-xl bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-700"
            >
                Complete Profile
            </a>

        </div>

    </div>

@else

    <div
        class="teacher-card overflow-hidden rounded-2xl border border-emerald-200 bg-emerald-50 p-5 dark:border-emerald-900/50 dark:bg-emerald-950/20"
    >

        <div class="flex items-center gap-3">

            <div
                class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400"
            >
                ✓
            </div>

            <div>

                <h2 class="font-semibold text-emerald-900 dark:text-emerald-300">
                    Profile Complete
                </h2>

                <p class="mt-1 text-sm text-emerald-700 dark:text-emerald-400">
                    Your teacher profile contains all required information.
                </p>

            </div>

        </div>

    </div>

@endif


        {{-- =====================================================
             MAIN DASHBOARD
        ====================================================== --}}
        <div
            class="grid grid-cols-1 gap-6 lg:grid-cols-3"
        >

            {{-- =================================================
                 QUICK ACTIONS
            ================================================== --}}
            <div class="lg:col-span-2">

                <div class="mb-4 teacher-fade-in">

                    <h2
                        class="text-xl font-bold text-zinc-900 dark:text-white"
                    >
                        Quick Actions
                    </h2>

                    <p
                        class="mt-1 text-sm text-zinc-500 dark:text-zinc-400"
                    >
                        Access your teacher tools quickly.
                    </p>

                </div>


                {{-- Action Cards --}}
                <div
                    class="grid grid-cols-1 gap-4 sm:grid-cols-2"
                >

                    {{-- My Profile --}}
                    <a
                        href="{{ route('teacher.profile') }}"
                        wire:navigate
                        class="teacher-action teacher-card teacher-delay-1 group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
                    >

                        <div
                            class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-indigo-500/5 transition duration-500 group-hover:scale-150"
                        ></div>

                        <div class="relative">

                            <span
                                class="teacher-icon mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-400"
                            >
                                <flux:icon
                                    name="user-circle"
                                    class="!h-6 !w-6"
                                />
                            </span>

                            <h3
                                class="text-lg font-bold text-zinc-900 dark:text-white"
                            >
                                My Profile
                            </h3>

                            <p
                                class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400"
                            >
                                View and update your personal and professional
                                information.
                            </p>

                            <div
                                class="mt-5 flex items-center gap-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400"
                            >

                                <span>
                                    Manage Profile
                                </span>

                                <flux:icon
                                    name="arrow-right"
                                    class="teacher-arrow !h-4 !w-4"
                                />

                            </div>

                        </div>

                    </a>


                    {{-- Teaching Information --}}
                    <div
                        class="teacher-card teacher-delay-2 group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
                    >

                        <div
                            class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-emerald-500/5 transition duration-500 group-hover:scale-150"
                        ></div>

                        <div class="relative">

                            <span
                                class="teacher-icon mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400"
                            >
                                <flux:icon
                                    name="presentation-chart-bar"
                                    class="!h-6 !w-6"
                                />
                            </span>

                            <h3
                                class="text-lg font-bold text-zinc-900 dark:text-white"
                            >
                                Teaching Information
                            </h3>

                            <div class="mt-4 space-y-3">

                                <div
                                    class="flex items-center justify-between gap-4"
                                >

                                    <span
                                        class="text-sm text-zinc-500 dark:text-zinc-400"
                                    >
                                        Subject
                                    </span>

                                    <span
                                        class="max-w-[55%] truncate text-right text-sm font-semibold text-zinc-900 dark:text-white"
                                    >
                                        {{ $teacher->subject ?? 'Not specified' }}
                                    </span>

                                </div>

                                <div
                                    class="h-px bg-zinc-100 dark:bg-zinc-800"
                                ></div>

                                <div
                                    class="flex items-center justify-between gap-4"
                                >

                                    <span
                                        class="text-sm text-zinc-500 dark:text-zinc-400"
                                    >
                                        Qualification
                                    </span>

                                    <span
                                        class="max-w-[55%] truncate text-right text-sm font-semibold text-zinc-900 dark:text-white"
                                    >
                                        {{ $teacher->qualification ?? 'Not specified' }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Joining Date --}}
                    <div
                        class="teacher-card teacher-delay-3 group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
                    >

                        <div
                            class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-violet-500/5 transition duration-500 group-hover:scale-150"
                        ></div>

                        <div class="relative">

                            <span
                                class="teacher-icon mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-violet-100 text-violet-600 dark:bg-violet-500/10 dark:text-violet-400"
                            >
                                <flux:icon
                                    name="calendar-days"
                                    class="!h-6 !w-6"
                                />
                            </span>

                            <h3
                                class="text-lg font-bold text-zinc-900 dark:text-white"
                            >
                                Joining Date
                            </h3>

                            <p
                                class="mt-3 text-2xl font-bold text-zinc-900 dark:text-white"
                            >
                                {{ $teacher->joining_date?->format('d M Y') ?? 'Not specified' }}
                            </p>

                            <p
                                class="mt-1 text-sm text-zinc-500 dark:text-zinc-400"
                            >
                                Your registered joining date
                            </p>

                        </div>

                    </div>


                    {{-- Account --}}
                    <div
                        class="teacher-card teacher-delay-4 group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
                    >

                        <div
                            class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-rose-500/5 transition duration-500 group-hover:scale-150"
                        ></div>

                        <div class="relative">

                            <span
                                class="teacher-icon mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-rose-100 text-rose-600 dark:bg-rose-500/10 dark:text-rose-400"
                            >
                                <flux:icon
                                    name="shield-check"
                                    class="!h-6 !w-6"
                                />
                            </span>

                            <h3
                                class="text-lg font-bold text-zinc-900 dark:text-white"
                            >
                                Account
                            </h3>

                            <p
                                class="mt-2 truncate text-sm text-zinc-500 dark:text-zinc-400"
                            >
                                {{ auth()->user()->email }}
                            </p>

                            <div
                                class="mt-4 inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400"
                            >

                                <span
                                    class="teacher-status h-2 w-2 rounded-full bg-emerald-500"
                                ></span>

                                Account Active

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 TEACHER INFORMATION
            ================================================== --}}
            <div>

                <div class="mb-4 teacher-fade-in">

                    <h2
                        class="text-xl font-bold text-zinc-900 dark:text-white"
                    >
                        Teacher Information
                    </h2>

                    <p
                        class="mt-1 text-sm text-zinc-500 dark:text-zinc-400"
                    >
                        Your registered details.
                    </p>

                </div>


                <div
                    class="teacher-card teacher-delay-3 overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
                >

                    {{-- Profile Header --}}
                    <div
                        class="relative overflow-hidden bg-gradient-to-br from-zinc-800 to-zinc-950 p-6"
                    >

                        <div
                            class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-white/5"
                        ></div>

                        <div
                            class="relative flex items-center gap-4"
                        >

                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-white/10 text-xl font-bold text-white ring-1 ring-white/20"
                            >
                                {{ strtoupper(substr($teacher->name, 0, 1)) }}
                            </div>

                            <div class="min-w-0">

                                <h3
                                    class="truncate text-lg font-bold text-white"
                                >
                                    {{ $teacher->name }}
                                </h3>

                                <p
                                    class="mt-1 text-sm text-zinc-400"
                                >
                                    Teacher
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Details --}}
                    <div
                        class="divide-y divide-zinc-100 dark:divide-zinc-800"
                    >

                        {{-- Employee --}}
                        <div
                            class="flex items-center gap-3 p-4 transition duration-200 hover:bg-zinc-50 dark:hover:bg-zinc-800/50"
                        >

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-400"
                            >
                                <flux:icon
                                    name="identification"
                                    class="!h-4 !w-4"
                                />
                            </span>

                            <div class="min-w-0">

                                <p
                                    class="text-xs text-zinc-500 dark:text-zinc-400"
                                >
                                    Employee Number
                                </p>

                                <p
                                    class="truncate text-sm font-semibold text-zinc-900 dark:text-white"
                                >
                                    {{ $teacher->employee_number }}
                                </p>

                            </div>

                        </div>


                        {{-- Phone --}}
                        <div
                            class="flex items-center gap-3 p-4 transition duration-200 hover:bg-zinc-50 dark:hover:bg-zinc-800/50"
                        >

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400"
                            >
                                <flux:icon
                                    name="phone"
                                    class="!h-4 !w-4"
                                />
                            </span>

                            <div class="min-w-0">

                                <p
                                    class="text-xs text-zinc-500 dark:text-zinc-400"
                                >
                                    Phone
                                </p>

                                <p
                                    class="truncate text-sm font-semibold text-zinc-900 dark:text-white"
                                >
                                    {{ $teacher->phone ?? 'Not specified' }}
                                </p>

                            </div>

                        </div>


                        {{-- Address --}}
                        <div
                            class="flex items-center gap-3 p-4 transition duration-200 hover:bg-zinc-50 dark:hover:bg-zinc-800/50"
                        >

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400"
                            >
                                <flux:icon
                                    name="map-pin"
                                    class="!h-4 !w-4"
                                />
                            </span>

                            <div class="min-w-0">

                                <p
                                    class="text-xs text-zinc-500 dark:text-zinc-400"
                                >
                                    Address
                                </p>

                                <p
                                    class="truncate text-sm font-semibold text-zinc-900 dark:text-white"
                                >
                                    {{ $teacher->address ?? 'Not specified' }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Update Button --}}
                    <div
                        class="border-t border-zinc-100 p-4 dark:border-zinc-800"
                    >

                        <a
                            href="{{ route('teacher.profile') }}"
                            wire:navigate
                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-zinc-900 px-4 py-3 text-sm font-semibold text-white shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-zinc-700 hover:shadow-lg dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200"
                        >

                            <flux:icon
                                name="pencil-square"
                                class="!h-4 !w-4"
                            />

                            <span>
                                Update Profile
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             INFORMATION BANNER
        ====================================================== --}}
        <div
            class="teacher-card teacher-delay-5 overflow-hidden rounded-2xl border border-indigo-100 bg-indigo-50 p-5 dark:border-indigo-500/20 dark:bg-indigo-500/5"
        >

            <div
                class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
            >

                <div class="flex items-start gap-4">

                    <span
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-400"
                    >
                        <flux:icon
                            name="information-circle"
                            class="!h-5 !w-5"
                        />
                    </span>

                    <div>

                        <h3
                            class="font-semibold text-indigo-950 dark:text-indigo-200"
                        >
                            Keep your information updated
                        </h3>

                        <p
                            class="mt-1 text-sm text-indigo-700 dark:text-indigo-300"
                        >
                            Make sure your phone, address, qualification and
                            other professional details are always accurate.
                        </p>

                    </div>

                </div>


                <a
                    href="{{ route('teacher.profile') }}"
                    wire:navigate
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-md"
                >

                    <span>
                        Edit Profile
                    </span>

                    <flux:icon
                        name="arrow-right"
                        class="!h-4 !w-4"
                    />

                </a>

            </div>

        </div>

    </div>
</div>



{{-- =============================================================
     TEACHER DASHBOARD ANIMATIONS
============================================================= --}}
<style>

    /* Icons */
    #teacher-dashboard svg {
        width: 20px !important;
        height: 20px !important;
        max-width: 20px !important;
        max-height: 20px !important;
    }

    /* Header */
    .teacher-fade-in {
        animation: teacherFadeIn 0.7s ease-out both;
    }

    @keyframes teacherFadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    /* Cards */
    .teacher-card {
        opacity: 0;
        animation: teacherCardIn 0.6s ease-out forwards;
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .teacher-card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 18px 30px -10px rgb(0 0 0 / 0.15);
    }

    @keyframes teacherCardIn {
        from {
            opacity: 0;
            transform: translateY(25px) scale(0.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }


    /* Animation delays */
    .teacher-delay-1 {
        animation-delay: 0.10s;
    }

    .teacher-delay-2 {
        animation-delay: 0.20s;
    }

    .teacher-delay-3 {
        animation-delay: 0.30s;
    }

    .teacher-delay-4 {
        animation-delay: 0.40s;
    }

    .teacher-delay-5 {
        animation-delay: 0.50s;
    }


    /* Icon animation */
    .teacher-icon {
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;
    }

    .teacher-card:hover .teacher-icon {
        transform: scale(1.1) rotate(-5deg);
        box-shadow: 0 8px 15px rgb(0 0 0 / 0.12);
    }


    /* Arrow */
    .teacher-arrow {
        transition: transform 0.3s ease;
    }

    .teacher-action:hover .teacher-arrow {
        transform: translateX(6px);
    }


    /* Avatar */
    .teacher-avatar {
        animation: teacherAvatar 3s ease-in-out infinite;
    }

    @keyframes teacherAvatar {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-6px);
        }

    }


    /* Progress */
    .teacher-progress {
        transform-origin: left;
        animation: teacherProgress 1s ease-out 0.5s both;
    }

    @keyframes teacherProgress {

        from {
            transform: scaleX(0);
        }

        to {
            transform: scaleX(1);
        }

    }


    /* Status */
    .teacher-status {
        animation: teacherStatus 2s ease-in-out infinite;
    }

    @keyframes teacherStatus {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: 0.5;
            transform: scale(1.3);
        }

    }


    /* Mobile */
    @media (max-width: 639px) {

        .teacher-card:hover {
            transform: translateY(-3px);
        }

    }


    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {

        .teacher-card,
        .teacher-fade-in,
        .teacher-avatar,
        .teacher-progress,
        .teacher-status {
            animation: none !important;
            opacity: 1 !important;
            transition: none !important;
        }

    }

</style>

</x-layouts.app>
