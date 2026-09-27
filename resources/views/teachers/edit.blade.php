<x-layouts.app :title="__('Edit Teacher')">

    <div class="mx-auto max-w-4xl">

        {{-- Header --}}
        <div class="mb-6">
            <flux:heading size="xl">
                Edit Teacher
            </flux:heading>

            <flux:text class="mt-1">
                Update teacher profile information.
            </flux:text>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 dark:border-red-800 dark:bg-red-900/20">
                <div class="font-semibold text-red-700 dark:text-red-400">
                    Please fix the following errors:
                </div>

                <ul class="mt-2 list-disc pl-5 text-sm text-red-600 dark:text-red-400">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('teachers.update', $teacher) }}"
            method="POST"
            class="space-y-6"
        >
            @csrf
            @method('PUT')

            {{-- Personal Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">

                <flux:heading size="lg">
                    Personal Information
                </flux:heading>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    <flux:input
                        name="name"
                        label="Full Name"
                        value="{{ old('name', $teacher->name) }}"
                        required
                    />

                    <flux:input
                        name="employee_number"
                        label="Employee Number"
                        value="{{ old('employee_number', $teacher->employee_number) }}"
                        required
                    />

                    <flux:select
                        name="gender"
                        label="Gender"
                    >
                        <option value="">Select Gender</option>

                        <option
                            value="Male"
                            @selected(old('gender', $teacher->gender) === 'Male')
                        >
                            Male
                        </option>

                        <option
                            value="Female"
                            @selected(old('gender', $teacher->gender) === 'Female')
                        >
                            Female
                        </option>
                    </flux:select>

                    <flux:input
                        type="date"
                        name="date_of_birth"
                        label="Date of Birth"
                        value="{{ old('date_of_birth', $teacher->date_of_birth?->format('Y-m-d')) }}"
                    />

                    <flux:input
                        name="phone"
                        label="Phone"
                        value="{{ old('phone', $teacher->phone) }}"
                    />

                    <flux:input
                        name="address"
                        label="Address"
                        value="{{ old('address', $teacher->address) }}"
                    />

                </div>

            </div>

            {{-- Professional Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">

                <flux:heading size="lg">
                    Professional Information
                </flux:heading>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    <flux:input
                        name="qualification"
                        label="Qualification"
                        value="{{ old('qualification', $teacher->qualification) }}"
                    />

                    <flux:input
                        name="subject"
                        label="Subject"
                        value="{{ old('subject', $teacher->subject) }}"
                    />

                    <flux:input
                        type="date"
                        name="joining_date"
                        label="Joining Date"
                        value="{{ old('joining_date', $teacher->joining_date?->format('Y-m-d')) }}"
                    />

                </div>

            </div>

            {{-- Login Account --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">

                <flux:heading size="lg">
                    Login Account
                </flux:heading>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    <flux:input
                        label="Email"
                        value="{{ $teacher->user?->email ?? 'No account' }}"
                        readonly
                    />

                    <flux:input
                        label="Role"
                        value="{{ ucfirst($teacher->user?->role ?? 'No account') }}"
                        readonly
                    />

                </div>

                <flux:text class="mt-4">
                    Login email and password are managed separately.
                </flux:text>

            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-end gap-3">

                <flux:button
                    :href="route('teachers.show', $teacher)"
                    wire:navigate
                >
                    Cancel
                </flux:button>

                <flux:button
                    type="submit"
                    variant="primary"
                >
                    Save Changes
                </flux:button>

            </div>

        </form>

    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Teacher Updated! 🎉',
                    text: @js(session('success')),
                    icon: 'success',
                    confirmButtonText: 'Continue',
                    confirmButtonColor: '#4f46e5'
                });
            });
        </script>
    @endif

</x-layouts.app>
