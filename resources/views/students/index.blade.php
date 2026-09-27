<x-layouts.app>

<div class="mx-auto w-full max-w-7xl space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400">
                Horizon Academy
            </p>

            <h1 class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                Students
            </h1>

            <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                Manage student profiles and accounts.
            </p>
        </div>

        <a
            href="{{ route('students.create') }}"
            class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-black p-2 border shadow-sm transition hover:bg-indigo-700"
        >
            + Add Student
        </a>

    </div>

  

    {{-- Students Table --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        @if ($students->count())

            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="border-b border-slate-200 bg-slate-50 dark:border-neutral-700 dark:bg-neutral-800/60">
                        <tr>
                            <th class="px-6 py-4 font-semibold text-slate-700 dark:text-neutral-300">
                                Student
                            </th>

                            <th class="px-6 py-4 font-semibold text-slate-700 dark:text-neutral-300">
                                Admission No.
                            </th>

                            <th class="px-6 py-4 font-semibold text-slate-700 dark:text-neutral-300">
                                Class
                            </th>

                            <th class="px-6 py-4 font-semibold text-slate-700 dark:text-neutral-300">
                                Section
                            </th>

                            <th class="px-6 py-4 font-semibold text-slate-700 dark:text-neutral-300">
                                Gender
                            </th>

                            <th class="px-6 py-4 font-semibold text-slate-700 dark:text-neutral-300">
                                Account
                            </th>

                            <th class="px-6 py-4 text-right font-semibold text-slate-700 dark:text-neutral-300">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200 dark:divide-neutral-700">

                        @foreach ($students as $student)

                            <tr class="transition hover:bg-slate-50 dark:hover:bg-neutral-800/50">

                                {{-- Student --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-100 font-semibold text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400">
                                            {{ strtoupper(substr($student->name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-900 dark:text-white">
                                                {{ $student->name }}
                                            </p>

                                            <p class="text-xs text-slate-500 dark:text-neutral-400">
                                                {{ $student->user?->email ?? 'No account email' }}
                                            </p>
                                        </div>

                                    </div>

                                </td>

                                {{-- Admission Number --}}
                                <td class="px-6 py-4 text-slate-600 dark:text-neutral-300">
                                    {{ $student->admission_number }}
                                </td>

                                {{-- Class --}}
                                <td class="px-6 py-4 text-slate-600 dark:text-neutral-300">
                                    {{ $student->class_name ?: '—' }}
                                </td>

                                {{-- Section --}}
                                <td class="px-6 py-4 text-slate-600 dark:text-neutral-300">
                                    {{ $student->section ?: '—' }}
                                </td>

                                {{-- Gender --}}
                                <td class="px-6 py-4 text-slate-600 dark:text-neutral-300">
                                    {{ $student->gender ?: '—' }}
                                </td>

                                {{-- Account Status --}}
                                <td class="px-6 py-4">

                                    @if ($student->user)

                                        @if ($student->user->status === 'approved')

                                            <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400">
                                                Approved
                                            </span>

                                        @elseif ($student->user->status === 'pending')

                                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700 dark:bg-amber-500/10 dark:text-amber-400">
                                                Pending
                                            </span>

                                        @else

                                            <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700 dark:bg-red-500/10 dark:text-red-400">
                                                {{ ucfirst($student->user->status) }}
                                            </span>

                                        @endif

                                    @else

                                        <span class="text-xs text-slate-400">
                                            No account
                                        </span>

                                    @endif

                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-4 text-right">

                                <div class="flex items-center justify-end gap-3">

                                    <a
                                        href="{{ route('students.show', $student) }}"
                                        class="font-medium text-indigo-600 hover:text-indigo-800 dark:text-indigo-400"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('students.edit', $student) }}"
                                        class="font-medium text-amber-600 hover:text-amber-800 dark:text-amber-400"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        id="delete-student-form-{{ $student->id }}"
                                        method="POST"
                                        action="{{ route('students.destroy', $student) }}"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="button"
                                            onclick="confirmStudentDelete({{ $student->id }})"
                                            class="rounded-xl border bg-red-600 px-3 py-2.5 text-sm font-semibold text-black shadow-sm transition hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="border-t border-slate-200 px-6 py-4 dark:border-neutral-700">
                {{ $students->links() }}
            </div>

        @else

            {{-- Empty State --}}
            <div class="flex flex-col items-center justify-center px-6 py-16 text-center">

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-100 text-3xl dark:bg-indigo-500/10">
                    🎓
                </div>

                <h2 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                    No students found
                </h2>

                <p class="mt-2 max-w-md text-sm text-slate-500 dark:text-neutral-400">
                    There are no student records yet. You can add a student manually or approve a student registration request.
                </p>

                <a
                    href="{{ route('students.create') }}"
                    class="mt-6 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700"
                >
                    Add First Student
                </a>

            </div>

        @endif

    </div>

</div>


<script>
    function confirmStudentDelete(studentId) {
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
                document
                    .getElementById('delete-student-form-' + studentId)
                    .submit();
            }
        });
    }
</script>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Student Deleted! 🗑️',
                text: @js(session('success')),
                icon: 'success',
                confirmButtonText: 'Continue',
                confirmButtonColor: '#4f46e5'
            });
        });
    </script>
@endif

</x-layouts.app>
