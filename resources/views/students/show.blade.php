<x-layouts.app>
    
<div class="mx-auto w-full max-w-5xl space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400">
                Horizon Academy
            </p>

            <h1 class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                Student Profile
            </h1>

            <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                View complete student information.
            </p>
        </div>

        <a
            href="{{ route('students.index') }}"
            class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800"
        >
            ← Back to Students
        </a>

    </div>

    {{-- Student Header Card --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

            <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-2xl bg-indigo-100 text-2xl font-bold text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400">
                {{ strtoupper(substr($student->name, 0, 1)) }}
            </div>

            <div class="flex-1">

                <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                    {{ $student->name }}
                </h2>

                <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                    {{ $student->user?->email ?? 'No account email' }}
                </p>

                <div class="mt-3 flex flex-wrap gap-2">

                    <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400">
                        {{ $student->admission_number }}
                    </span>

                    @if ($student->user?->status === 'approved')
                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400">
                            Account Approved
                        </span>
                    @elseif ($student->user?->status === 'pending')
                        <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700 dark:bg-amber-500/10 dark:text-amber-400">
                            Account Pending
                        </span>
                    @elseif ($student->user)
                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700 dark:bg-red-500/10 dark:text-red-400">
                            {{ ucfirst($student->user->status) }}
                        </span>
                    @endif

                </div>

            </div>

        </div>

    </div>

    {{-- Personal Information --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="mb-6">
            <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                Personal Information
            </h2>

            <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                Basic personal information of the student.
            </p>
        </div>

        <div class="grid gap-5 sm:grid-cols-2">

            <div>
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Full Name
                </p>
                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
                    {{ $student->name ?: 'Not provided' }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Gender
                </p>
                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
                    {{ $student->gender ?: 'Not provided' }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Date of Birth
                </p>
                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
                    {{ $student->date_of_birth?->format('d M Y') ?? 'Not provided' }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Phone
                </p>
                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
                    {{ $student->phone ?: 'Not provided' }}
                </p>
            </div>

        </div>

    </div>

    {{-- Academic Information --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="mb-6">
            <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                Academic Information
            </h2>

            <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                Student's academic details.
            </p>
        </div>

        <div class="grid gap-5 sm:grid-cols-3">

            <div>
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Admission Number
                </p>
                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
                    {{ $student->admission_number }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Class
                </p>
                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
                    {{ $student->class_name ?: 'Not provided' }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Section
                </p>
                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
                    {{ $student->section ?: 'Not provided' }}
                </p>
            </div>

        </div>

    </div>

    {{-- Guardian Information --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="mb-6">
            <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                Guardian Information
            </h2>

            <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                Parent or guardian contact information.
            </p>
        </div>

        <div class="grid gap-5 sm:grid-cols-2">

            <div>
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Guardian Name
                </p>
                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
                    {{ $student->guardian_name ?: 'Not provided' }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Guardian Phone
                </p>
                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
                    {{ $student->guardian_phone ?: 'Not provided' }}
                </p>
            </div>

        </div>

    </div>

    {{-- Address --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="mb-6">
            <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                Address
            </h2>

            <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                Student's residential address.
            </p>
        </div>

        <p class="text-sm leading-6 text-slate-700 dark:text-neutral-300">
            {{ $student->address ?: 'Address not provided.' }}
        </p>

    </div>

</div>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Student Updated! 🎓',
                text: @js(session('success')),
                icon: 'success',
                confirmButtonText: 'Continue',
                confirmButtonColor: '#4f46e5'
            });
        });
    </script>
@endif


<script>
    function confirmStudentDelete() {
        Swal.fire({
            title: 'Delete Student?',
            text: 'This will permanently delete the student and their login account.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-student-form').submit();
            }
        });
    }
</script>

</x-layouts.app>
