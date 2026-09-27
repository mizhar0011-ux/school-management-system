<x-layouts.app>

@php
$profileComplete = $staff
&& filled($staff->name)
&& filled($staff->gender)
&& filled($staff->date_of_birth)
&& filled($staff->phone)
&& filled($staff->department)
&& filled($staff->designation)
&& filled($staff->joining_date)
&& filled($staff->address);
@endphp

<div
    id="staff-dashboard"
    class="min-h-screen bg-zinc-50 px-4 py-6 dark:bg-zinc-950 sm:px-6 lg:px-8"
>
    <div class="mx-auto max-w-7xl space-y-6">


    {{-- =====================================================
         WELCOME HEADER
    ====================================================== --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-700 p-6 shadow-xl sm:p-8"
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

            <div class="staff-fade-in">

                <div class="mb-3 flex items-center gap-2 text-emerald-100">

                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10"
                    >
                        <flux:icon
                            name="briefcase"
                            class="!h-5 !w-5"
                        />
                    </span>

                    <span class="text-sm font-medium">
                        Staff Portal
                    </span>

                </div>

                <h1
                    class="text-2xl font-bold tracking-tight text-white sm:text-3xl lg:text-4xl"
                >
                    Welcome, {{ $staff->name }}! 👋
                </h1>

                <p
                    class="mt-2 max-w-xl text-sm leading-6 text-emerald-100 sm:text-base"
                >
                    Manage your staff profile and keep your professional
                    information up to date.
                </p>

            </div>


            {{-- Staff Avatar --}}
            <div class="flex shrink-0 items-center justify-center">

                <div
                    class="staff-avatar flex h-20 w-20 items-center justify-center rounded-2xl border border-white/20 bg-white/10 text-2xl font-bold text-white shadow-lg backdrop-blur-sm sm:h-24 sm:w-24"
                >
                    {{ strtoupper(substr($staff->name, 0, 1)) }}
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
            class="staff-card staff-delay-1 group rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
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
                        {{ $staff->employee_number }}
                    </p>

                </div>

                <span
                    class="staff-icon flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400"
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
                    class="staff-progress h-full w-full rounded-full bg-emerald-500"
                ></div>
            </div>

        </div>


        {{-- Department --}}
        <div
            class="staff-card staff-delay-2 group rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
        >

            <div class="flex items-start justify-between gap-4">

                <div class="min-w-0">

                    <p
                        class="text-sm font-medium text-zinc-500 dark:text-zinc-400"
                    >
                        Department
                    </p>

                    <p
                        class="mt-2 truncate text-xl font-bold text-zinc-900 dark:text-white"
                    >
                        {{ $staff->department ?? 'Not specified' }}
                    </p>

                </div>

                <span
                    class="staff-icon flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-teal-100 text-teal-600 dark:bg-teal-500/10 dark:text-teal-400"
                >
                    <flux:icon
                        name="building-office"
                        class="!h-5 !w-5"
                    />
                </span>

            </div>

            <p
                class="mt-4 text-xs text-zinc-500 dark:text-zinc-400"
            >
                Staff department
            </p>

        </div>


        {{-- Designation --}}
        <div
            class="staff-card staff-delay-3 group rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
        >

            <div class="flex items-start justify-between gap-4">

                <div class="min-w-0">

                    <p
                        class="text-sm font-medium text-zinc-500 dark:text-zinc-400"
                    >
                        Designation
                    </p>

                    <p
                        class="mt-2 truncate text-xl font-bold text-zinc-900 dark:text-white"
                    >
                        {{ $staff->designation ?? 'Not specified' }}
                    </p>

                </div>

                <span
                    class="staff-icon flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400"
                >
                    <flux:icon
                        name="briefcase"
                        class="!h-5 !w-5"
                    />
                </span>

            </div>

            <p
                class="mt-4 text-xs text-zinc-500 dark:text-zinc-400"
            >
                Professional position
            </p>

        </div>

    </div>

    {{-- =====================================================
     PROFILE COMPLETION STATUS
====================================================== --}}
@if (! $profileComplete)

    <div
        class="staff-card overflow-hidden rounded-2xl border border-amber-200 bg-amber-50 p-5 dark:border-amber-900/50 dark:bg-amber-950/20"
    >

        <div
            class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
        >

            <div>

                <h2 class="font-semibold text-amber-900 dark:text-amber-300">
                    Complete your staff profile
                </h2>

                <p class="mt-1 text-sm text-amber-700 dark:text-amber-400">
                    Your profile is incomplete. Please provide the remaining
                    information to complete your staff record.
                </p>

            </div>

            <a
                href="{{ route('staff.profile') }}"
                wire:navigate
                class="inline-flex shrink-0 items-center justify-center rounded-xl bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-700"
            >
                Complete Profile
            </a>

        </div>

    </div>

@else

    <div
        class="staff-card overflow-hidden rounded-2xl border border-emerald-200 bg-emerald-50 p-5 dark:border-emerald-900/50 dark:bg-emerald-950/20"
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
                    Your staff profile contains all required information.
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

            <div class="mb-4 staff-fade-in">

                <h2
                    class="text-xl font-bold text-zinc-900 dark:text-white"
                >
                    Quick Actions
                </h2>

                <p
                    class="mt-1 text-sm text-zinc-500 dark:text-zinc-400"
                >
                    Access your staff tools quickly.
                </p>

            </div>


            {{-- Action Cards --}}
            <div
                class="grid grid-cols-1 gap-4 sm:grid-cols-2"
            >

                {{-- My Profile --}}
                <a
                    href="{{ route('staff.profile') }}"
                    wire:navigate
                    class="staff-action staff-card staff-delay-1 group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
                >

                    <div
                        class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-emerald-500/5 transition duration-500 group-hover:scale-150"
                    ></div>

                    <div class="relative">

                        <span
                            class="staff-icon mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400"
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
                            class="mt-5 flex items-center gap-2 text-sm font-semibold text-emerald-600 dark:text-emerald-400"
                        >

                            <span>
                                Manage Profile
                            </span>

                            <flux:icon
                                name="arrow-right"
                                class="staff-arrow !h-4 !w-4"
                            />

                        </div>

                    </div>

                </a>


                {{-- Employment Information --}}
                <div
                    class="staff-card staff-delay-2 group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
                >

                    <div
                        class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-teal-500/5 transition duration-500 group-hover:scale-150"
                    ></div>

                    <div class="relative">

                        <span
                            class="staff-icon mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-teal-100 text-teal-600 dark:bg-teal-500/10 dark:text-teal-400"
                        >
                            <flux:icon
                                name="building-office"
                                class="!h-6 !w-6"
                            />
                        </span>

                        <h3
                            class="text-lg font-bold text-zinc-900 dark:text-white"
                        >
                            Employment Information
                        </h3>

                        <div class="mt-4 space-y-3">

                            <div
                                class="flex items-center justify-between gap-4"
                            >

                                <span
                                    class="text-sm text-zinc-500 dark:text-zinc-400"
                                >
                                    Department
                                </span>

                                <span
                                    class="max-w-[55%] truncate text-right text-sm font-semibold text-zinc-900 dark:text-white"
                                >
                                    {{ $staff->department ?? 'Not specified' }}
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
                                    Designation
                                </span>

                                <span
                                    class="max-w-[55%] truncate text-right text-sm font-semibold text-zinc-900 dark:text-white"
                                >
                                    {{ $staff->designation ?? 'Not specified' }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Joining Date --}}
                <div
                    class="staff-card staff-delay-3 group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
                >

                    <div
                        class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-cyan-500/5 transition duration-500 group-hover:scale-150"
                    ></div>

                    <div class="relative">

                        <span
                            class="staff-icon mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-100 text-cyan-600 dark:bg-cyan-500/10 dark:text-cyan-400"
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
                            {{ $staff->joining_date?->format('d M Y') ?? 'Not specified' }}
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
                    class="staff-card staff-delay-4 group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
                >

                    <div
                        class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-rose-500/5 transition duration-500 group-hover:scale-150"
                    ></div>

                    <div class="relative">

                        <span
                            class="staff-icon mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-rose-100 text-rose-600 dark:bg-rose-500/10 dark:text-rose-400"
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
                                class="staff-status h-2 w-2 rounded-full bg-emerald-500"
                            ></span>

                            Account Active

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
             STAFF INFORMATION
        ================================================== --}}
        <div>

            <div class="mb-4 staff-fade-in">

                <h2
                    class="text-xl font-bold text-zinc-900 dark:text-white"
                >
                    Staff Information
                </h2>

                <p
                    class="mt-1 text-sm text-zinc-500 dark:text-zinc-400"
                >
                    Your registered details.
                </p>

            </div>


            <div
                class="staff-card staff-delay-3 overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900"
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
                            {{ strtoupper(substr($staff->name, 0, 1)) }}
                        </div>

                        <div class="min-w-0">

                            <h3
                                class="truncate text-lg font-bold text-white"
                            >
                                {{ $staff->name }}
                            </h3>

                            <p
                                class="mt-1 text-sm text-zinc-400"
                            >
                                {{ $staff->designation ?? 'Staff Member' }}
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
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400"
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
                                {{ $staff->employee_number }}
                            </p>

                        </div>

                    </div>


                    {{-- Phone --}}
                    <div
                        class="flex items-center gap-3 p-4 transition duration-200 hover:bg-zinc-50 dark:hover:bg-zinc-800/50"
                    >

                        <span
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-teal-100 text-teal-600 dark:bg-teal-500/10 dark:text-teal-400"
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
                                {{ $staff->phone ?? 'Not specified' }}
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
                                {{ $staff->address ?? 'Not specified' }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Update Button --}}
                <div
                    class="border-t border-zinc-100 p-4 dark:border-zinc-800"
                >

                    <a
                        href="{{ route('staff.profile') }}"
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
        class="staff-card staff-delay-5 overflow-hidden rounded-2xl border border-emerald-100 bg-emerald-50 p-5 dark:border-emerald-500/20 dark:bg-emerald-500/5"
    >

        <div
            class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
        >

            <div class="flex items-start gap-4">

                <span
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400"
                >
                    <flux:icon
                        name="information-circle"
                        class="!h-5 !w-5"
                    />
                </span>

                <div>

                    <h3
                        class="font-semibold text-emerald-950 dark:text-emerald-200"
                    >
                        Keep your information updated
                    </h3>

                    <p
                        class="mt-1 text-sm text-emerald-700 dark:text-emerald-300"
                    >
                        Make sure your phone, address, department,
                        designation and other professional details are
                        always accurate.
                    </p>

                </div>

            </div>


            <a
                href="{{ route('staff.profile') }}"
                wire:navigate
                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-md"
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

{{-- =============================================================
STAFF DASHBOARD ANIMATIONS
============================================================= --}}

<style>

    /* Icons */
    #staff-dashboard svg {
        width: 20px !important;
        height: 20px !important;
        max-width: 20px !important;
        max-height: 20px !important;
    }


    /* Header */
    .staff-fade-in {
        animation: staffFadeIn 0.7s ease-out both;
    }

    @keyframes staffFadeIn {
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
    .staff-card {
        opacity: 0;
        animation: staffCardIn 0.6s ease-out forwards;
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .staff-card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 18px 30px -10px rgb(0 0 0 / 0.15);
    }

    @keyframes staffCardIn {
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
    .staff-delay-1 {
        animation-delay: 0.10s;
    }

    .staff-delay-2 {
        animation-delay: 0.20s;
    }

    .staff-delay-3 {
        animation-delay: 0.30s;
    }

    .staff-delay-4 {
        animation-delay: 0.40s;
    }

    .staff-delay-5 {
        animation-delay: 0.50s;
    }

    .staff-delay-6 {
        animation-delay: 0.60s;
    }


    /* Icon animation */
    .staff-icon {
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;
    }

    .staff-card:hover .staff-icon {
        transform: scale(1.1) rotate(-5deg);
        box-shadow: 0 8px 15px rgb(0 0 0 / 0.12);
    }


    /* Arrow */
    .staff-arrow {
        transition: transform 0.3s ease;
    }

    .staff-action:hover .staff-arrow {
        transform: translateX(6px);
    }


    /* Avatar */
    .staff-avatar {
        animation: staffAvatar 3s ease-in-out infinite;
    }

    @keyframes staffAvatar {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-6px);
        }

    }


    /* Progress */
    .staff-progress {
        transform-origin: left;
        animation: staffProgress 1s ease-out 0.5s both;
    }

    @keyframes staffProgress {

        from {
            transform: scaleX(0);
        }

        to {
            transform: scaleX(1);
        }

    }


    /* Status */
    .staff-status {
        animation: staffStatus 2s ease-in-out infinite;
    }

    @keyframes staffStatus {

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

        .staff-card:hover {
            transform: translateY(-3px);
        }

    }


    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {

        .staff-card,
        .staff-fade-in,
        .staff-avatar,
        .staff-progress,
        .staff-status {
            animation: none !important;
            opacity: 1 !important;
            transition: none !important;
        }

    }

</style>

</x-layouts.app>
