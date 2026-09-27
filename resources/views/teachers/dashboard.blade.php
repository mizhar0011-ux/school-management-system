<x-layouts.app :title="__('Teachers')">

    <div class="flex flex-col gap-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <flux:heading size="xl">
                    Teachers
                </flux:heading>

                <flux:text class="mt-1">
                    Manage teachers and their login accounts.
                </flux:text>
            </div>

            <flux:button
                variant="primary"
                :href="route('teachers.create')"
                wire:navigate
            >
                Add Teacher
            </flux:button>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: 'Success! 🎉',
                        text: @js(session('success')),
                        icon: 'success',
                        confirmButtonText: 'Continue',
                        confirmButtonColor: '#4f46e5'
                    });
                });
            </script>
        @endif

        {{-- Teacher Table --}}
        <div class="overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-900">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-800">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold">
                                Teacher
                            </th>

                            <th class="px-6 py-4 text-left font-semibold">
                                Employee No.
                            </th>

                            <th class="px-6 py-4 text-left font-semibold">
                                Subject
                            </th>

                            <th class="px-6 py-4 text-left font-semibold">
                                Qualification
                            </th>

                            <th class="px-6 py-4 text-left font-semibold">
                                Account
                            </th>

                            <th class="px-6 py-4 text-right font-semibold">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">

                        @forelse ($teachers as $teacher)

                            <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800">

                                {{-- Teacher --}}
                                <td class="px-6 py-4">
                                    <div class="font-medium">
                                        {{ $teacher->name }}
                                    </div>

                                    <div class="text-xs text-zinc-500">
                                        {{ $teacher->user?->email ?? 'No account' }}
                                    </div>
                                </td>

                                {{-- Employee Number --}}
                                <td class="px-6 py-4">
                                    {{ $teacher->employee_number }}
                                </td>

                                {{-- Subject --}}
                                <td class="px-6 py-4">
                                    {{ $teacher->subject ?? 'Not assigned' }}
                                </td>

                                {{-- Qualification --}}
                                <td class="px-6 py-4">
                                    {{ $teacher->qualification ?? 'Not provided' }}
                                </td>

                                {{-- Account --}}
                                <td class="px-6 py-4">

                                    @if ($teacher->user)

                                        @if ($teacher->user->status === 'approved')
                                            <span class="text-sm font-medium text-green-600">
                                                Approved
                                            </span>
                                        @elseif ($teacher->user->status === 'pending')
                                            <span class="text-sm font-medium text-yellow-600">
                                                Pending
                                            </span>
                                        @else
                                            <span class="text-sm font-medium text-red-600">
                                                Declined
                                            </span>
                                        @endif

                                    @else
                                        <span class="text-sm text-zinc-500">
                                            No account
                                        </span>
                                    @endif

                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4">

                                    <div class="flex justify-end gap-2">

                                        <flux:button
                                            size="sm"
                                            :href="route('teachers.show', $teacher)"
                                            wire:navigate
                                        >
                                            View
                                        </flux:button>

                                        <flux:button
                                            size="sm"
                                            :href="route('teachers.edit', $teacher)"
                                            wire:navigate
                                        >
                                            Edit
                                        </flux:button>

                                        <form
                                                action="{{ route('teachers.destroy', $teacher) }}"
                                                method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this teacher and their login account?');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <flux:button type="submit" variant="danger">
                                                    Delete
                                                </flux:button>
                                            </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">

                                    <div class="flex flex-col items-center gap-2">

                                        <div class="text-lg font-semibold">
                                            No teachers found
                                        </div>

                                        <div class="text-sm text-zinc-500">
                                            There are currently no teachers in the system.
                                        </div>

                                        <flux:button
                                            class="mt-3"
                                            variant="primary"
                                            :href="route('teachers.create')"
                                            wire:navigate
                                        >
                                            Add Your First Teacher
                                        </flux:button>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            @if ($teachers->hasPages())
                <div class="border-t border-zinc-200 px-6 py-4 dark:border-zinc-700">
                    {{ $teachers->links() }}
                </div>
            @endif

        </div>

    </div>

</x-layouts.app>


<script>
    function confirmTeacherDelete(teacherId) {

        Swal.fire({
            title: 'Delete Teacher?',
            text: 'This will permanently delete the teacher and their login account.',
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
                    .getElementById('delete-teacher-form-' + teacherId)
                    .submit();

            }

        });

    }
</script>